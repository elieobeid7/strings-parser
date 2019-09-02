from pathlib import Path
from analyzePHP import  analyzeStrings, remove_comments
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

    def getStrings(self, filePath, variables=False):
        fileName = self.getFileNameBase(filePath)
        blacklist = ['$private', '$verbs', '$inputRules']
        php_tags = ['<?php', '<?', '?>']

        with open(filePath) as text:
            data = remove_comments(text.read())
        for item in php_tags:
            data = data.replace(item, '')
        
        expressions = data.split(';')
        for sentence in expressions:
            blacklisted = False
            if any(word in sentence for word in blacklist):
                blacklisted = True
            if blacklisted == False and "".join([fileName,'__']) not in sentence and "''" not in sentence and '""' not in sentence and "' '" not in sentence and '" "' not in sentence and sentence and sentence is not None:
                word_list = sentence.split('=', 1)
                result = [x.strip() for x in word_list]
                analyzeStrings(result, filePath, fileName, variables=False)
        
        return True

   # Get filename without path, prefix or extension
    def getFileNameBase(self, filePath):
        filePath = Path(filePath).stem  # remove path and extension
        filePath = filePath.replace(self.filePrefix, '')  # remove prefix
        return filePath
