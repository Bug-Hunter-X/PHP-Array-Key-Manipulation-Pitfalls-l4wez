# PHP Array Key Manipulation Pitfalls

This repository demonstrates a common, yet often overlooked, error in PHP related to array key manipulation.  Specifically, it highlights unexpected behavior when using `unset()` and modifying arrays by reference.

The `bug.php` file contains code that exemplifies the problem, while `bugSolution.php` provides a corrected version with explanations.

## Problem Description

In PHP, using `unset()` on an array element removes the entire key-value pair, not just the value.  Re-assigning a value to the same key after using `unset()` does not restore the original key; it instead creates a new key-value pair.  This behavior can be subtle and lead to unexpected results.

Modifying arrays by reference, without a complete understanding of how it affects the original array, can lead to even more unexpected results, as this can create side-effects in other parts of the code where the array is also used.

## Solution

The `bugSolution.php` file offers solutions and strategies to prevent these issues.