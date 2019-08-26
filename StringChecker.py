from pathlib import Path
from enumPHP import Seperator
from analyzePHP import analyzePHP, filterText
from writer import writeStringsToTranslationFilePHP
import glob


class StringChecker:
    def __init__(self, filePrefix, fileExt, folder):
        self.filePrefix = filePrefix
        self.fileExt = fileExt
        self.folder = folder

    # get files having a predefined prefix
    def getFiles(self):
        folder = ''.join([self.folder, '/**/*', self.filePrefix, self.fileExt])
        files = glob.glob(folder, recursive=True)
        return files

    def getExpression(self, fileName):
        expression = ''
        results = []
        with open(fileName) as text:
            data = text.read()
            for char in data:
                if char is not Seperator.END.value:
                    expression = ''.join([expression, char])
                else:
                    result = filterText(expression)
                    expression = ''
                    if result is not None:
                        results.append(result)

        return results

    # Get filename without path, prefix or extension
    def getFileNameBase(self, fileName): 
        fileName = Path(fileName).stem # remove path and extension
        fileName = fileName.replace(self.filePrefix, '') # remove prefix
        return fileName


    def locateExpressionSemiCol(self,fileName):
        lineCounter =1
        expression = ''
        previousExp = ''
        mComment = False
   
        with open(fileName) as text:
            data = text.read()
            for char in data:
                expression = ''.join([expression, char])
                expression = expression.replace(" ", "")
                if char == Seperator.NEW_LINE.value:
                    lineCounter+=1
                    #print('new line')

                if expression.startswith(Seperator.MULTILINES_COMMENT_START.value):
                    mComment = True
                    #print('multiline comment start')
                elif expression.startswith(Seperator.MULTILINES_COMMENT_END.value) and mComment == True:
                    mComment = False
                    #print('multiline comment end')

                if mComment == False: # if multiline comment  is false 
                   # print('we can start')
                    if not expression.startswith(Seperator.PHPSTART.value) and not expression.startswith(Seperator.PHPEND.value) and not expression.startswith(Seperator.COMMENT.value) and mComment == False:
                        singleQuotesCount = expression.count(Seperator.SINGLE_QUOTE.value)
                        doubleQuotesCount = expression.count(Seperator.DOUBLE_QUOTE.value)
                     #   print ('getting expression')


                        if expression.endswith(Seperator.END.value):
                            # end of expression
                            expression = ''.join([previousExp, expression])
                            result = analyzePHP(expression, singleQuotesCount, doubleQuotesCount)
                        #    print('analyzing')
                            previousExp = ''
                            if result is not None:
                         #       print('result is ' + str(result))
                                writeStringsToTranslationFilePHP(expression, lineCounter, result)
                            
                        
                        # paragraph
                        else:
                            previousExp = ''.join([previousExp, expression])
                 #           print('paragraph')


                expression = ''
                #print('next expression')


                


