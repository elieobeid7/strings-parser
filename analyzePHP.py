from enumPHP import Seperator, State
import re
counter = 1


def remove_comments(string):
    pattern = r"(\".*?\"|\'.*?\')|(/\*.*?\*/|//[^\r\n]*$)"
    # first group captures quoted strings (double or single)
    # second group captures comments (//single-line or /* multi-line */)
    regex = re.compile(pattern, re.MULTILINE | re.DOTALL)

    def _replacer(match):
        # if the 2nd group (capturing comments) is not None,
        # it means we have captured a non-quoted (real) comment string.
        if match.group(2) is not None:
            return ""  # so we will return empty to remove the comment
        else:  # otherwise, we will return the 1st group
            return match.group(1)  # captured quoted-string
    return regex.sub(_replacer, string)

def filterText(expression):
    counter = 0
    sentence = ''
    for char in expression:
        counter += 1
        sentence = ''.join([sentence, char])
        if char is Seperator.NEW_LINE.value:
            if  Seperator.EQUAL.value not in sentence:
                expression = expression[counter:]
                counter = 0
                sentence = ''
            else:
                break
    return expression


def getPHPStrings(expression, blacklist):
    blacklisted = False

    for item in blacklist:
        if item in expression:
            blacklisted = True
            break

    if blacklisted ==False:
        singleQuotesCount = expression.count(Seperator.SINGLE_QUOTE.value)
        doubleQuotesCount = expression.count(Seperator.DOUBLE_QUOTE.value)
        expression = expression.replace(" ", "")

        if doubleQuotesCount == 2 and expression.endswith(Seperator.DOUBLE_QUOTE_END.value) and Seperator.DOUBLE_QUOTE_EQUAL.value in expression:
            if expression.startswith(Seperator.CONST.value):
                return State.CONST_DOUBLE_QUOTE.value
            else: 
                return State.STRING_DOUBLE_QUOTE.value
        elif singleQuotesCount == 2 and expression.endswith(Seperator.SINGLE_QUOTE_END.value) and Seperator.SINGLE_QUOTE_EQUAL.value in expression:
            if expression.startswith(Seperator.CONST.value):
                return State.CONST_SINGLE_QUOTE.value
            else: 
                return State.STRING_SINGLE_QUOTE.value
        
        elif Seperator.SINGLE_QUOTE_ASSOC.value in expression:
            return State.SINGLE_QUOTE_ASSOC_ARRAY.value

        elif  Seperator.DOUBLE_QUOTE_ASSOC.value in expression:
            return State.DOUBLE_QUOTE_ASSOC_ARRAY.value

        elif Seperator.SINGLE_QUOTE_DOT.value in expression or Seperator.DOT_SINGLE_QUOTE.value in expression:
            return State.SINGLE_QUOTE_STRING_VARIABLE.value
            
        elif Seperator.DOUBLE_QUOTE_DOT.value in expression or Seperator.DOT_DOUBLE_QUOTE.value in expression: 
            return State.DOUBLE_QUOTE_STRING_VARIABLE.value
            
        elif Seperator.RESPONSE.value in expression and Seperator.VOID.value not in expression:
            return State.RESPONSE.value