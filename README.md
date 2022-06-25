```
<?php
    namespace utils;
    class GenerateCode{
        public const DATA_TYPE_MAPPING = [
            "boolean" => "bool",
            "character" => "char",
            "string" => "string",
            "integer" => "int",
            "long_integer" => "long",
            "float" => "float",
            "double" =>"double"
        ];
        public static function genCode(){
            $header = "#include <bits/stdc++.h>\n\nusing namespace std;\n\nstring ltrim(const string &);\nstring rtrim(const string &);\nvector<string> split(const string &);\n\n";
            $body = "";
            $tail = "int main()\n{\n";
        }

        public static function getTypeName($type_name, $name){
            $data_mapping = static::DATA_TYPE_MAPPING;
            if (str_contains($type_name, "_array")){
                $type = explode("_", $type_name)[0];
                $type = $data_mapping[$type];
                return "vector<$type> $name";   
            }
            else{
                $type = $data_mapping[$type_name];
                return "$type $name";
            }
            
        }

        public static function genInput($data_type, $name){
            $data_mapping = static::DATA_TYPE_MAPPING;
            $str = "";
            if ($data_type == "string"){
                $str = "\tstring $name;\n\tgetline(cin, $name);\n\n";
            } else if ($data_type == "character"){
                $temp_name = $name . "_temp";
                $str = "\tstring $temp_name;\n\tgetline(cin, $temp_name);\n\n\tchar $name = $temp_name"."[0];\n\n";
            }
            else if ($data_type == "boolean"){
                $temp_name = $name . "_temp";
                $type = $data_mapping[$data_type];
                $str = "\tstring $temp_name;\n\tgetline(cin, $temp_name);\n\n\t$type $name = stoi(ltrim(rtrim($temp_name))) !=0;\n\n";
            }
            else{
                $temp_name = $name . "_temp";
                $type = $data_mapping[$data_type];
                $str = "\tstring $temp_name;\n\tgetline(cin, $temp_name);\n\n\t$type $name = sto".$type[0]."(ltrim(rtrim($temp_name)));\n\n";
            }
            return $str;
        }

        public static function genMultiInputInLine($inputs){
            $data_mapping = static::DATA_TYPE_MAPPING;
            $str = "vector<string> first_multiple_input = split(rtrim(first_multiple_input_temp));\n\n";
            foreach ($inputs as $index => $input) {
                $data_type = $input["type_name"];
                $name = $input["name"];
                $str = $str . static::getTypeName($data_type, $input["name"]);
                if ($data_type == "string"){
                    $str .= " = first_multiple_input[$index];\n\n";
                } else if ($data_type == "character"){
                    $str .= " = (first_multiple_input[$index])[0];\n\n";
                }
                else if ($data_type == "boolean"){
                    $type = $data_mapping[$data_type];
                    $str .= " = (first_multiple_input[$index] != 0);\n\n";
                }
                else{
                    $type = $data_mapping[$data_type];
                    $str .= " = sto".$type[0]."(first_multiple_input[$index]);\n\n";
                }
            }
            return $str;
        }

        public static function genReadInputArray($type_name, $name, $size){
            $arr_temp_temp = $name."_temp_temp";
            $arr_temp = $name."_temp";
            $str = "\tstring $arr_temp_temp;\n\tgetline(cin, $arr_temp_temp);\n\tvector<string> $arr_temp = split(rtrim($arr_temp_temp));\n";
            $str .= "\tvector<$type_name> $name($size);\n\tfor (int i = 0; i < $size; i++)\n\t{\n\t\t";
            if ($type_name == "string"){
                $str .= "string $name"."_item = $arr_temp"."[i];\n\n\t\t$name"."[i] = $name"."_item;\n\t}";
            }else if ($type_name == "character"){
                $str .= "char $name"."_item = $arr_temp"."[i][0];\n\n\t\t$name"."[i] = $name"."_item;\n\t}";

            }
            else if ($type_name == "boolean"){
                $str .= "bool $name"."_item = stoi($arr_temp"."[i]) != 0;\n\n\t\t$name"."[i] = $name"."item;\n\t}";
            }
            else{
                $str .="bool $name"."_item = sto".$type_name[0]."($arr_temp"."[i]);\n\n\t\t$name"."[i] = $name"."item;\n\t}";
            }
            return $str;
        }

    }


    // echo GenerateCode::genInput("integer", "var1");
    // echo GenerateCode::genInput("double", "var2");
    $arr = [
        [
            "name" => "v1",
            "type_name" => "integer"    
        ],
        [
            "name" => "v2",
            "type_name" => "float"    
        ],
        [
            "name" => "v3",
            "type_name" => "string"    
        ]
    ];
    echo GenerateCode::genMultiInputInLine($arr);
    echo GenerateCode::genReadInputArray("string", "array1", "m");


```
