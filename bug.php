In PHP, a common yet subtle error arises when dealing with array keys.  Consider this scenario:

```php
<?php
$myArray = ['a' => 1, 'b' => 2];
unset($myArray['a']);
$myArray['a'] = 3;
print_r($myArray);
?>
```

You might expect the output to be `Array ( [b] => 2 [a] => 3 )`. However, the output is actually `Array ( [b] => 2 )`. This is because `unset()` doesn't simply remove the value; it removes the key-value pair entirely.  Re-assigning a value to the same key does *not* restore it, but instead creates a new entry.  This is because `unset` doesn't automatically re-index numeric arrays, and in the case of string keys, it's actually removing the key, making it no longer present in the array.

This can lead to unexpected behavior, especially in larger codebases where you might think you're modifying an existing array element but are actually creating a new one.

Another similar issue is with functions that modify arrays by reference. If you don't fully understand how this works, you can run into issues. A simple example:

```php
<?php
function modifyArray(&$array) {
  $array[] = 4; // Append a value
}

$myArray = [1, 2, 3];
modifyArray($myArray);
print_r($myArray); //Output: Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 )
?>
```

While seemingly harmless, if you're expecting the original array to remain unchanged in some other part of your code, it might lead to very unexpected results.