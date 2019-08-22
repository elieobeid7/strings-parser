def writeStringsToTranslationFilePHP(expression,lineCounter,result):

    with open('files/Translation.php', 'a') as the_file:
    the_file.write(expression + ',' + lineCounter + ',' + result + '/n')
