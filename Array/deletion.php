<?php

class ArrayDeletion
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

	public function deletion($value)
	{
		if ($this->top == -1) {
			return 'Oops, array is empty!';
		} else {
			while ($this->front <= $this->top) {

				// If value does not match in the array list.
				$checkValue = false;

				if ($this->array[$this->front] == $value) {
					$checkValue = true;
					$this->array[$this->front] = -1;

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

$array = new ArrayDeletion(5);
$array->insert(10);
$array->insert(20);
$array->insert(30);
$array->insert(40);
$array->insert(50);

// Array is overflow! Because array index is over more than array size.
// $array->insert(60);

echo '<pre>';
print_r($array->display());

$array->deletion(30);
$array->deletion(40);

echo 'After delete element:<br/>';
echo '<pre>';
print_r($array->display());

$array->deletion(400);