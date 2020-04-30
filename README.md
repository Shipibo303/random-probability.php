# Usage
`randomWithProbability([item, probability]...);`

The actual probability is basically the percentage of the sum of probabilities, so it's recommended to choose values that add up to something meaningful. Like if you choose your sum to be 100, it would be equivalent to percentage.
For example:
```php
randomWithProbability([1, 60], [2, 20], [3, 10], [4, 10]);
```
Will produce:
* Number 1 with 60% chance
* Number 2 with 20% chance
* Number 3 with 10% chance
* Number 4 with 10% chance

By running a `testRandom(array, iterations)` function with the array returned from `constructArray()`, you can test how accurate the probability is on a specified number of picks.

If we test the example above, the result for me on 999999 picks was:
> array(4) { [1]=> float(59.95815995816) [2]=> float(20.03232003232) [3]=> float(10.02611002611) [4]=> float(9.98340998341) }

Note that the probability is always somewhere around the desired value, the more iterations you choose, the closer it would probably be
