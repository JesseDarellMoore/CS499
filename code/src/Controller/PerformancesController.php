<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Theaters Controller
 */
class PerformancesController extends AppController {

	public function index($mode = "open")
	{

		$this->viewBuilder()->layout("site");
		$this->set("css", ["site"]);

		$this->set("mode", $mode);

		$this->set("tabs", [
			["open", "Seats Available", "left"],
			["closed", "Sold Out", "left"],
			["finished", "Concluded", "left"],
			["all", "All Performances", "left"],
			["season", "Season Tickets", "right"],
		]);

		$this->set("plays", [
			["othello", "The Tragedy of Othello, the Moor of Venice", [
				[1, "January 2nd, 2016, 10:00pm", "Civic Center Concert Hall", 10, "the-tragedy-of-othello-the-moor-of-venice"],
				[2, "January 2nd, 2016, 10:00pm", "Civic Center Concert Hall", 10, "the-tragedy-of-othello-the-moor-of-venice"],
				[3, "January 2nd, 2016, 10:00pm", "Civic Center Concert Hall", 10, "the-tragedy-of-othello-the-moor-of-venice"],
				[4, "January 2nd, 2016, 10:00pm", "Civic Center Concert Hall", 10, "the-tragedy-of-othello-the-moor-of-venice"],
			]],
			["macbeth", "The Tragedy of Macbeth", [
				[1, "January 2nd, 2016, 10:00pm", "Civic Center Concert Hall", 10, "the-tragedy-of-macbeth"],
				[2, "January 2nd, 2016, 10:00pm", "Civic Center Concert Hall", 10, "the-tragedy-of-macbeth"],
			]],
		]);

	}

	public function view($id, $slug, $row = 0) {

		$this->viewBuilder()->layout("site");
		$this->set("css", ["site"]);

		$this->set("play_id", "othello");
		$this->set("play_name", "The Tragedy of Othello, the Moor of Venice");
		$this->set("play_theater", "Civic Center Concert Hall");
		$this->set("play_date", "January 6th, 2016");
		$this->set("play_time", "10:00 pm");
		$this->set("play_about", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam pharetra bibendum interdum. Etiam convallis leo quis ipsum rhoncus egestas. Ut a est vel urna cursus feugiat et sagittis enim. Sed lectus arcu, sagittis nec urna in, ultrices hendrerit massa. Quisque rutrum efficitur scelerisque. Fusce non convallis ex, sagittis elementum eros. Suspendisse mattis, velit vel pellentesque varius, felis leo gravida magna, vel dignissim arcu ipsum vel diam. Etiam suscipit felis mi, at facilisis tellus pulvinar et.");

		$this->set("selected_row", $row);

		$this->set("sections", [
			["Front", "Back", [
				["A", 0, ["A1", "A2", "A3", "A4", "A5"], [false, false, false, false, false]],
				["B", 2, ["B1", "B2", "B3", "B4", "B5"], [true, true, false, false, false]],
				["C", 5, ["C1", "C2", "C3", "C4", "C5"], [true, true, true, true, true]],
			]],
			["Balcony", "&nbsp;", [
				["U", 5, ["U1", "U2", "U3", "U4", "U5"], [true, true, true, true, true]],
				["V", 5, ["V1", "V2", "V3", "V4", "V5"], [true, true, true, true, true]],
				["W", 5, ["W1", "W2", "W3", "W4", "W5"], [true, true, true, true, true]],
			]],
			["&nbsp;", "&nbsp;", [
				["<span class='icomoon'>&#xe9b2;</span>", 5, ["AC1", "AC2", "AC3", "AC4", "AC5"], [true, true, true, true, true]],
			]]
		]);

	}


}