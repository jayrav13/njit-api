<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\Building;

class BuildingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Building::create(["name" => "Student Mall / Parking Deck", "website_id" => 1, "google_place_id" => "ChIJP-qtPYJUwokRZp7m-pDLNoo"]);
        Building::create(["name" => "York Center for Environmental Engineering & Science", "website_id" => 2, "google_place_id" => "ChIJb49GtH1TwokRz0Fb7P8WS6E"]);
        Building::create(["name" => "Laurel Residence Hall", "website_id" => 3, "google_place_id" => "ChIJG_uEU3xTwokROq7wjL9P1Fw"]);
        Building::create(["name" => "Oak Residence Hall", "website_id" => 4, "google_place_id" => "ChIJuRhhV3xTwokRjZfjq2zBISU"]);
        Building::create(["name" => "Weston Hall / College of Architecture & Design", "website_id" => 5, "google_place_id" => "ChIJFVb22n1TwokRj4O4Fk1ZM3w"]);
        Building::create(["name" => "Specht Building", "website_id" => 6, "google_place_id" => null]);
        Building::create(["name" => "Colton Hall", "website_id" => 7, "google_place_id" => null]);
        Building::create(["name" => "Campbell Hall / Student Services", "website_id" => 8, "google_place_id" => "ChIJN1yWyH1TwokR02ihXvE86Fc"]);
        Building::create(["name" => "ECE Building", "website_id" => 9, "google_place_id" => "ChIJszFAun1TwokR7Z342MtD8FM"]);
        Building::create(["name" => "Microelectronics Center", "website_id" => 10, "google_place_id" => "ChIJ7WIFvX1TwokRzAYdJn1ubAs"]);
        Building::create(["name" => "Faculty Memorial Hall", "website_id" => 11, "google_place_id" => "ChIJI_k4vX1TwokRwLnj-UPPzhY"]);
        Building::create(["name" => "Tiernan Hall", "website_id" => 12, "google_place_id" => "ChIJh7ldoH1TwokRwGTOC3jH8ic"]);
        Building::create(["name" => "Lubetkin Field at J. Malcolm Simon Stadium", "website_id" => 13, "google_place_id" => "ChIJwS2pc31TwokRhdsDnGHNblI"]);
        Building::create(["name" => "CHEN Building", "website_id" => 14, "google_place_id" => null]);
        Building::create(["name" => "EDC 2", "website_id" => 15, "google_place_id" => "ChIJMarASH1TwokRBFq2H6kozJY"]);
        Building::create(["name" => "EDC 3", "website_id" => 16, "google_place_id" => "ChIJMarASH1TwokRBFq2H6kozJY"]);
        Building::create(["name" => "Estelle & Zoom Fleisher Athletic Center", "website_id" => 17, "google_place_id" => "ChIJRTbcfn1TwokRp8Of2KpExBE"]);
        Building::create(["name" => "The Green", "website_id" => 18, "google_place_id" => "ChIJw_0rhX1TwokRQDb-o4Q9Ymk"]);
        Building::create(["name" => "Kupfrian Hall", "website_id" => 19, "google_place_id" => "ChIJ5S_3kn1TwokRIsSTYQ0sHDA"]);
        Building::create(["name" => "Central King Building", "website_id" => 20, "google_place_id" => "ChIJKyLg4H1TwokRMypy__6xsGQ"]);
        Building::create(["name" => "Fenster Hall / Admissions", "website_id" => 21, "google_place_id" => "ChIJtZyc_H1TwokRxB3qkVkfdbg"]);
        Building::create(["name" => "Cullimore Hall", "website_id" => 22, "google_place_id" => "ChIJEe_s-H1TwokRWdullxbRv5s"]);
        Building::create(["name" => "Eberhardt Hall / Alumni Center", "website_id" => 23, "google_place_id" => "ChIJB9gI_31TwokRMRcmV_iYkQU"]);
        Building::create(["name" => "Campus Center", "website_id" => 24, "google_place_id" => "ChIJ-ZbDmH1TwokRQ1_5LnoofLk"]);
        Building::create(["name" => "Cypress Residence Hall", "website_id" => 25, "google_place_id" => "ChIJAXVkeYJUwokRI5MsZoqhppE"]);
        Building::create(["name" => "Redwood Residence Hall", "website_id" => 26, "google_place_id" => "ChIJgVTufYJUwokRXOa2GzKdq7s"]);
        Building::create(["name" => "Naimoli Family Athletic & Recreational Facility", "website_id" => 27, "google_place_id" => "ChIJR4-vhoJUwokRAXX1jenprwg"]);
        Building::create(["name" => "Guttenberg Information Technologies Center", "website_id" => 28, "google_place_id" => "ChIJ-ZbDmH1TwokRQ1_5LnoofLk"]);
        Building::create(["name" => "Mechanical Engineering Center", "website_id" => 29, "google_place_id" => "ChIJ89QxbIJUwokR65ia3CcFCB8"]);
        Building::create(["name" => "Central Ave Building", "website_id" => 30, "google_place_id" => "ChIJP99oEoJUwokR9ZVC_yxyP2s"]);
        Building::create(["name" => "Van Houten Library", "website_id" => 31, "google_place_id" => "ChIJD8XvDYJUwokRDpsqaoyQKKY"]);
        Building::create(["name" => "Warren Street Village", "website_id" => 32, "google_place_id" => "ChIJx_wFqH1TwokR4EvVqhDuRSM"]);
        Building::create(["name" => "Albert Dorman Honors College Building", "website_id" => 33, "google_place_id" => "ChIJb6zFBX1TwokRUBG-OMCl-T0"]);
        Building::create(["name" => "Greek Houses", "website_id" => 34, "google_place_id" => null]);

    }
}
