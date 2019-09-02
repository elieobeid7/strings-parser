from writer import translateLaravel, replace_string, writeVariables
import re


def returnString(expressionList, filePath, fileName, variables=False):
    new_string = ''
    singleQuotesCount = expressionList[1].count("'")
    doubleQuotesCount = expressionList[1].count('"')
    if singleQuotesCount == 2 and expressionList[1].startswith("'") and expressionList[1].endswith("'"):
        new_string = translateLaravel(fileName, expressionList[1])
        
    elif doubleQuotesCount == 2 and expressionList[1].startswith('"') and expressionList[1].endswith('"'):
        new_string = translateLaravel(fileName, expressionList[1])
        
    elif "." in expressionList[1] and ('"' in expressionList[1] or "'" in expressionList[1]):
        variable_list = expressionList[1].split('.')
        for item in variable_list:
            item = item.strip()
            if item.startswith('"') or item.startswith("'"):
                if len(item>1):
                    if variables == True:
                        new_string = translateLaravel(fileName, item)
                    writeVariables(fileName,item)
        
    elif "=>" in expressionList[1]:
        assoc = expressionList[1].split("=>")
        assoc = assoc[1::2]
        php_tags = str.maketrans("", "", "[],")

        assoc = [s.translate(php_tags) for s in assoc]
        for item in assoc:
            item = item.strip()
            singleQuotesCount = item.count("'")
            doubleQuotesCount = item.count('"')
            if singleQuotesCount == 2 and item.startswith("'") and item.endswith("'"):
                new_string = translateLaravel(fileName, item)
            elif doubleQuotesCount == 2 and item.startswith('"') and item.endswith('"'):
                new_string = translateLaravel(fileName, item)
        
    elif len(expressionList) == 1 and '(' in expressionList and variables == False:
        if expressionList.count('"') % 2 == 0 or  expressionList.count("'") % 2 == 0:
            if "$" in expressionList:
                writeVariables(fileName, item)
                
    
    return new_string


def analyzeStrings(expressionList, filePath, fileName, variables=False):
    expression = ''
    result = ''
    if len(expressionList)==2:
        expression = expressionList[1]
        result = returnString(expressionList, filePath, fileName, variables=False)

        
    elif len(expressionList) == 1 and  "()" not in expressionList[0] and "(" in expressionList[0]:
        if "response->" in expressionList[0]:
            expression = expressionList[0]
            response = expressionList[0].replace('(', '(trans(') 
            result = response.replace(')', '))')      
            
            if "'" in result or '"' in result:
                result = returnString(result, filePath, fileName)

        if expression is not None and result is not None:
            #replace_string(filePath, expression, result)
   
        if "'" in expression and expression.count("'") % 2 == 0:
            result = returnString(expressionList, filePath, fileName, variables=False)
        
        return True


                        



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
