<?php

class ArrayReverse
{
	private $array = [];
	private $swap_array = [];
	private $size;
	private $front = 0; // means, has an element in the array.
	private $top = -1; // means array is empty.
	private $start; // start index of array
	private $end; // end index of array
	private $temp; // store temporary value of array

	public function __construct($size)
	{
		$this->size = $size;
	}

	public function insert($item)
	{
		if ($this->top < $this->size - 1) {  // $this->size - 1 = 5-1 = 4
			$this->top = $this->top + 1;
			$this->array[$this->top] = $item;

			return $this->top .' => ' . $item;
		} else {
			echo 'Oops, array size is over.';
			die();
		}
	}

	public function display()
	{
		if ($this->top == -1) {
			return 'Oops, array is empty!';
		} else {
			return $this->array;
		}
	}

	public function reverse()
	{
		// when array is empty
		if ($this->top == -1) {
			return 'Oops, array is empty!';
		} else { 
			$this->start = 0; // 0 is the start index of array
			$this->end = $this->top; // end index of array.

			while ($this->start < $this->end) {
				$this->temp = $this->array[$this->start];
				$this->array[$this->start] = $this->array[$this->end];
				$this->array[$this->end] = $this->temp;
				$this->start++;
				$this->end--;
			}

			return $this->array;

			// Using without data structure
			// for ($this->end; $this->end >= 0; $this->end--) {
			// 	$this->swap_array[] = $this->array[$this->end];
			// }

			// return $this->swap_array;
		}
	}
}

$array = new ArrayReverse(5);
$array->insert(20);
$array->insert(30);
$array->insert(150);
$array->insert(90);
$array->insert(10);

// Array is overflow! Because array index is over more than array size.
// $array->insert(60);

echo '<pre>';
print_r($array->display());

print_r($array->reverse());