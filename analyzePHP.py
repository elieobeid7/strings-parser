from enumPHP import Seperator, State

def analyzePHP(expression,singleQuotesCount,doubleQuotesCount):
    # get all constants
    if expression.startswith(Seperator.CONST.value):
        return State.CONST.value
    
    # get all php strings without variables
    elif singleQuotesCount == 2 and expression.endswith(Seperator.SINGLE_QUOTE_END.value):
        return State.PHP_STRING.value
    elif doubleQuotesCount ==2 and expression.endswith (Seperator.DOUBLE_QUOTE_END.value):
        return State.PHP_STRING.value

    # get associative array
    elif Seperator.DOUBLE_QUOTE_ASSOC.value in expression or Seperator.SINGLE_QUOTE_ASSOC.value in expression:
        return State.ASSOC_ARRAY.value

    # get strings with variables
    elif Seperator.DOUBLE_QUOTE_DOT.value in expression or Seperator.DOUBLE_QUOTE.value in expression:
        return State.STRING_VARIABLE.value

    # get none void responses
    elif Seperator.RESPONSE.value in expression and not Seperator.VOID.value in expression:
        return State.RESPONSE.value

  # get strings inside functions, such as the response function
  # elif Seperator.DOUBLE_QUOTE_FUNCTION.value in expression or Seperator.SINGLE_QUOTE_FUNCTION.value in expression:
    #   return State.FUNCTION.value