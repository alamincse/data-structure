<?php

class ArraySearch
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

	public function search($value)
	{
		if ($this->top == -1) {
			return 'Oops, array is empty!';
		} else {
			while ($this->front <= $this->top) {

				// If value does not match in the array list.
				$checkValue = false;

				if ($this->array[$this->front] == $value) {
					$checkValue = true;
					
					return 'Found item '.$value . ' and position is '. ($this->front + 1) .'<br/>';
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

$array = new ArraySearch(5);
$array->insert(10);
$array->insert(20);
$array->insert(30);
$array->insert(40);
$array->insert(50);

// Array is overflow! Because array index is over more than array size.
// $array->insert(60);

echo '<pre>';
print_r($array->display());

echo $array->search(30);
echo $array->search(40);

$array->search(400);