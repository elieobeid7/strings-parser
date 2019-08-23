from enum import Enum
class Seperator(Enum):
    SEMICOL = ";"
    PHPSTART = "<?"
    PHPEND = '?>'
    DOT = "." 
    ARRAY_OPEN = "["
    ARRAY_CLOSE = "]"
    ASSOC = "=>" 
    PHP = "<?php"
    COMMENT = "//"
    MULTILINES_COMMENT_START = '/*'
    MULTILINES_COMMENT_END = '*/'
    NEW_LINE = "\n"
    VARIABLE = "$"
    CONST = "const"
    EQUAL = "="
    SINGLE_QUOTE = '"'
    DOUBLE_QUOTE = "'"
    COMMA = ','
    RESPONSE = 'response->'
    VOID = '()'
    SINGLE_QUOTE_END = "';"
    DOUBLE_QUOTE_END = '";'
    SINGLE_QUOTE_EQUAL = "='"
    DOUBLE_QUOTE_EQUAL = '="'
    SINGLE_QUOTE_COMMA = "',"
    DOUBLE_QUOTE_COMMA = '",'
    END = ';'
    SINGLE_QUOTE_DOT = ".'"
    DOUBLE_QUOTE_DOT = '."'
    DOUBLE_QUOTE_ASSOC = '=>"'
    SINGLE_QUOTE_ASSOC = "=>'"
    DOUBLE_QUOTE_FUNCTION = '("'
    SINGLE_QUOTE_FUNCTION = "('"
    
class State(Enum):
    RESPONSE = 0
    CONST = 1
    PHP_STRING = 2
    ARRAY = 3
    MULTILINES = 4
    ASSOC_ARRAY = 5
    STRING_VARIABLE = 6
    FUNCTION = 7

