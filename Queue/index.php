<?php 

class Queue 
{
	private $queue = [];
	private $front = -1; // Default front is null.
	private $rear = -1; // Default rear is null.
	private $size; // $size = 5; [0 => '', 1 => '', 2 => '', 3 => '', 4 => '']

	public function __construct($size)
	{
		$this->size = $size;
	}

	public function enqueue($item)
	{
		if ($this->rear == $this->size - 1) {
			echo 'The queue is overflow!';
			die();
		} elseif ($this->front == -1 && $this->rear == -1) {
			// $front and $rear both are -1 means queue is empty.
			$this->front = 0;
			$this->rear = 0;
			$this->queue[$this->rear] = $item;
		} else {
			// queue has some elements
			$this->rear++;
			$this->queue[$this->rear] = $item;
		}

		return $this->queue;
	}

	public function dequeue()
	{
		// check queue is empty
		if ($this->front == -1 && $this->rear == -1) {
			return 'Queue is empty!';
		} elseif ($this->front == $this->rear) { 
			// check queue has only one element.
			$this->front = -1;
			$this->rear = -1;
		} else {
			$this->queue[$this->front] = -1;
			$this->front++;
		}
		return $this->queue;
	}

	public function display() {
		if ($this->front == -1 && $this->rear == -1) {
			return 'Queue is empty!';
		} else {
			for ($this->front; $this->front < $this->rear + 1; $this->front++) {
				$this->queue[$this->front];
			}

			$this->front = 0;

			return $this->queue;
		}
	}

	public function front() {
		if ($this->front == -1 && $this->rear == -1) {
			return 'Queue is empty!';
		} else {
			return $this->queue[$this->front];
		}
	}

	public function back() {
		if ($this->front == -1 && $this->rear == -1) {
			return 'Queue is empty!';
		} else {
			return $this->queue[$this->rear];
		}
	}
}

$queue = new Queue(5);
$queue->enqueue(10);
$queue->enqueue(20);
$queue->enqueue(30);
$queue->enqueue(40);
$queue->enqueue(50);

// Queue is overflow! Because array index is over more than array size.
// $queue->enqueue(60); 
echo '<pre>';
print_r($queue->display());
echo 'Front value of array is ' .$queue->front();
$queue->dequeue();
echo '<br><br>After dequeue: <pre>';
print_r($queue->display());
echo 'End value of array is ' .$queue->back();