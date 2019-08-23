This is still work in progress

Right now it detects all one liner strings and responses, a seperate translation writer will be released which would add those strings to a translation file, and you define the keys you want to use.


##Why not use regex?

python's `in` is faster than `re.find()`, performencewise. If there's a regex that would be of a great help,please let me know.

##Why is there a big enum  full of seperators, like commas and whatnot?

I'm using them everywhere, so having them as strings is so much faster than constructing a string at runtime, plus there's less chance to make mistakes as a result of mixing them up.

## How to use it?

it's almost done, please check main.py, once done, I'll add all the details. analyzePHP.py still needs some fixing.


## Why did you do such architecture? One class and functions?

I don't know, might change in the future, my reasoning was, there's going to be one generic class and then stuff specific to a particular programming language go to simple functions in dfferent files.

## How to use the strings extracted?

The first version will support laravel translation files, and then JSON translation files will be supported, perhaps others too

## what kind of strings does it detect?

Look in `tests/testAction.php`

## why doesn't it remove comments in read mode?

That would make the process slower due to having to loop the file twice, plus line numbers matter
