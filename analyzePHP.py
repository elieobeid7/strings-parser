from enumPHP import Seperator, State
counter = 1


def filterText(expression):
    mcomment = False
    counter = 0
    sentence = ''
    expression = expression.replace(" ", "")
    for char in expression:
        counter += 1
        sentence = ''.join([sentence, char])
        if sentence.startswith(Seperator.MULTILINES_COMMENT_START.value):
            mcomment = True
        if char is Seperator.NEW_LINE.value:
            if mcomment == True or Seperator.EQUAL.value not in sentence or sentence.startswith(Seperator.COMMENT.value):
                expression = expression[counter:]
                counter = 0
                sentence = ''
                if mcomment == True and sentence.endswith(Seperator.MULTILINES_COMMENT_END.value):
                    mcomment = False
            else:
                break
    print(expression)
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
        if (doubleQuotesCount == 2 and expression.endswith(Seperator.DOUBLE_QUOTE_END.value) \
            and Seperator.DOUBLE_QUOTE_EQUAL.value in expression) or \
            (singleQuotesCount == 2 \
            and expression.endswith(Seperator.SINGLE_QUOTE_END.value) \
            and Seperator.SINGLE_QUOTE_EQUAL.value in expression):
                if expression.startswith(Seperator.CONST.value):
                    return State.CONST.value
                else: 
                    return State.PHP_STRING.value
            
        elif  Seperator.DOUBLE_QUOTE_ASSOC.value in expression or Seperator.SINGLE_QUOTE_ASSOC.value in expression:
            return State.ASSOC_ARRAY.value
            
        elif Seperator.DOUBLE_QUOTE_DOT.value in expression or Seperator.DOT_DOUBLE_QUOTE.value in expression \
            or Seperator.SINGLE_QUOTE_DOT.value in expression or Seperator.DOT_SINGLE_QUOTE.value in expression:
                return State.STRING_VARIABLE.value
            
        elif Seperator.RESPONSE.value in expression and Seperator.VOID.value not in expression:
            return State.RESPONSE.value
             


            
        



def analyzePHP(expression,singleQuotesCount,doubleQuotesCount):
    global counter
    print(expression + str(counter) + '\n')
    counter+=1
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
    elif Seperator.DOUBLE_QUOTE_DOT.value in expression or Seperator.SINGLE_QUOTE_DOT.value in expression:
        return State.STRING_VARIABLE.value

    # get none void responses
    elif Seperator.RESPONSE.value in expression and not Seperator.VOID.value in expression:
        return State.RESPONSE.value

  # get strings inside functions, such as the response function
  # elif Seperator.DOUBLE_QUOTE_FUNCTION.value in expression or Seperator.SINGLE_QUOTE_FUNCTION.value in expression:
    #   return State.FUNCTION.value



