from enumPHP import Seperator, State

def analyzePHP(expression,singleQuotesCount,doubleQuotesCount):
    singleQuotesCount = singleQuotesCount
    expression = expression.replace(" ", "")
    if expression.endswith(Seperator.SINGLE_QUOTE_END) or expression.endswith(Seperator.DOUBLE_QUOTE_END):
        if singleQuotesCount == 2 or doubleQuotesCount ==2:
            if Seperator.SINGLE_QUOTE_EQUAL in expression or Seperator.DOUBLE_QUOTE_EQUAL in expression:
                return State.STRING.value
