<?php

namespace php\classes;
use ReflectionClass;
use Symfony\Component\Yaml\Yaml;

abstract class YAMLFile {
    private static $objInstance;
    private static $filePath;

    public function __construct(string $filePath) {
        if (!file_exists($filePath)) {
            $this->save($filePath);
        }
        $this->load($filePath);
    }

    public function load(string $filePath) {
        $arrYaml = $this->yamlStringToArray(file_get_contents($filePath));
//        echo("<pre>");
//        var_dump($arrYaml);
//        echo("</pre>");
        $reflection = (new ReflectionClass(get_called_class()));
        foreach ($reflection->getProperties() as $property) {
            if ($property->isPrivate()) {
                continue;
            }
            $docComment = $property->getDocComment();

            $yamlPath = $property->getName();
            if (preg_match("/@YamlPath\(\"(.*)\"\)/", $docComment, $matches)) {
                $yamlPath = $matches[1];
            }

            $arrKeys = explode(".", $yamlPath);
            $value = "";
            $current = $arrYaml;
            foreach ($arrKeys as $key) {
                $value = $current[$key];
                $current = $current[$key];
            }

            $this::${$property->getName()} = $value;
        }

        self::$filePath = $filePath;
        self::$objInstance = $this;
    }

    private function yamlStringToArray(string $string): array {
        return Yaml::parse($string) ?? [];
    }

    public static function save(string $filePath = null) {
        if ($filePath == null) {
            $filePath = self::$filePath;
        }
        $arrNewConfigLines = [];

        $reflection = new ReflectionClass(get_called_class());
        $arrSetRootKeys = [];
        foreach ($reflection->getProperties() as $property) {
            if ($property->isPrivate()) {
                continue;
            }
            $docComment = $property->getDocComment();

            $yamlPath = $property->getName();
            if (preg_match("/@YamlPath\(\"(.*)\"\)/", $docComment, $matches)) {
                $yamlPath = $matches[1];
            }

            $commentLine = "";
            if (preg_match("/@YamlComment\(\"(.*)\"\)/", $docComment, $matches)) {
                $commentLine = "#" . $matches[1] . "\n";
            }

            $arrKeyPaths = explode(".", $yamlPath);
            $prefix = str_repeat(" ", count($arrKeyPaths) * 2);


            //Set roots
            for ($i = 0; $i < count($arrKeyPaths) - 1; $i++) {
                if (in_array(implode(".", array_slice($arrKeyPaths, 0, $i + 1)), $arrSetRootKeys)) {
                    continue;
                }
                $arrSetRootKeys[] = implode(".", array_slice($arrKeyPaths, 0, $i + 1));
                $arrNewConfigLines[] = "\n".str_repeat(" ", $i * 2) . $arrKeyPaths[$i] . ":";
            }

            //Escape value
            $value = self::escapeValue($property->getValue(self::getInstance()), $prefix);

            $arrNewConfigLines[] = $prefix . $commentLine . $prefix . $arrKeyPaths[count($arrKeyPaths) - 1] . ": " . $value;
        }

        file_put_contents($filePath, implode("\n", $arrNewConfigLines));
    }

    private static function escapeValue($value, $prefix = "") {
        if (is_string($value)) {
            $value = '"' . $value . '"';
        }
        if (is_bool($value)) {
            $value = $value ? "true" : "false";
        }
        if (is_array($value)) {
            $list = $value;
            $value = "";
            foreach ($list as $listValue) {
                $value .= "\n{$prefix}- " . self::escapeValue($listValue) . ",";
            }
        }
        return $value;
    }

    public static function getInstance() {
        return self::$objInstance;
    }
}