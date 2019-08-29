from enum import Enum
class Seperator(Enum):
    
    END = ';'
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
    SINGLE_QUOTE = "'"
    DOUBLE_QUOTE = '"'
    COMMA = ','
    RESPONSE = 'response->'
    VOID = '()'
    SINGLE_QUOTE_END = "';"
    DOUBLE_QUOTE_END = '";'
    SINGLE_QUOTE_EQUAL = "='"
    DOUBLE_QUOTE_EQUAL = '="'
    SINGLE_QUOTE_COMMA = "',"
    DOUBLE_QUOTE_COMMA = '",'
    SINGLE_QUOTE_DOT = "'."
    DOUBLE_QUOTE_DOT = '".'
    DOT_SINGLE_QUOTE = ".'"
    DOT_DOUBLE_QUOTE = '."'
    DOUBLE_QUOTE_ASSOC = '=>"'
    SINGLE_QUOTE_ASSOC = "=>'"
    DOUBLE_QUOTE_FUNCTION = '("'
    SINGLE_QUOTE_FUNCTION = "('"
    
class State(Enum):
    RESPONSE = 1
    CONST_SINGLE_QUOTE = 2
    CONST_DOUBLE_QUOTE = 3
    STRING_SINGLE_QUOTE = 4
    STRING_DOUBLE_QUOTE = 5
    SINGLE_QUOTE_MULTILINES = 6
    DOUBLE_QUOTE_MULTILINES = 7
    SINGLE_QUOTE_ASSOC_ARRAY = 8
    DOUBLE_QUOTE_ASSOC_ARRAY = 9
    SINGLE_QUOTE_STRING_VARIABLE = 10
    DOUBLE_QUOTE_STRING_VARIABLE = 11
    SINGLE_QUOTE_RESPONSE = 12
    DOUBLE_QUOTE_RESPONSE = 13
