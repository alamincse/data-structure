<?php

class ArrayUpdate
{
	private $array = [];
	private $size;
	private $front = 0; // means, has an element in the array.
	private $top = -1; // means array is empty.

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

	public function update($oldValue, $newValue)
	{
		if ($this->top == -1) {
			return 'Oops, array is empty!';
		} else {
			while ($this->front <= $this->top) {

				// If value does not match in the array list.
				$checkValue = false;

				if ($this->array[$this->front] == $oldValue) {
					$checkValue = true;
					$this->array[$this->front] = $newValue;
					
					return $this->array;
				}

				$this->front = $this->front + 1;
			}

			// Reset array index is 0
			$this->front = 0;

			if ($checkValue == false) {
				echo 'Oops, value does not match in the array list.'; 
				die();
			}
		}
	}
}

$array = new ArrayUpdate(5);
$array->insert(10);
$array->insert(20);
$array->insert(30);
$array->insert(40);
$array->insert(50);

// Array is overflow! Because array index is over more than array size.
// $array->insert(60);

echo '<pre>';
print_r($array->display());

print_r($array->update(30, 300));
print_r($array->update(40, 400));

echo '<pre>';
print_r($array->display());

echo $array->update(4000, 400);