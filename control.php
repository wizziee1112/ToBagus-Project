<?php
//-- TEKNIK OOP --

//fungsi untuk mengatur bahasa
function language($lang){
	switch ($lang) {
		case "en";
			require_once "english.php";
			break;
		case "in";
			require_once "indonesia.php";
	}
}

//Koneksi ke database
class databases {
	public $host = 'localhost:3308';
	public $name = 'root';
	public $pass = '';
	public $dbname = 'db_companyprofile';
	public $mysqli;

	//fungsi menguji koneksi database
		function __construct(){
		$this->mysqli = new mysqli($this->host, $this->name, $this->pass, $this->dbname);
		if ($this->mysqli->connect_errno){
			echo "databse not found";
			exit;
			}
		}

	//fungsi menampilkan isi data dari tbl_profile
		public function get_show_profile(){
		$language = isset($_GET['lang'])? $_GET['lang']:null;
		switch($language){
			default :
			case "in":
			$data_profile = "SELECT * FROM tbl_profile WHERE lang_profile='in' ORDER BY id_profile DESC LIMIT 1";
			break;

			case "en":
			$data_profile = "SELECT * FROM tbl_profile WHERE lang_profile='en' ORDER BY id_profile DESC LIMIT 1";
			break;
		}
		$hasil_profile = $this->mysqli->query($data_profile);
		while($row_profile=mysqli_fetch_array($hasil_profile)){
			$result_profile[] = $row_profile;
		}
		return $result_profile;
		}

	//fungsi menampilkan isi data dari tbl_services
		public function get_show_services(){
		$language = isset($_GET['lang'])? $_GET['lang']:null;
		switch($language){
			default :
			case "in":
			$data_services = "SELECT * FROM tbl_services WHERE lang_services='in' ORDER BY id_services DESC";
			break;

			case "en":
			$data_services = "SELECT * FROM tbl_services WHERE lang_services='en' ORDER BY id_services DESC";
			break;
		}
		$hasil_services = $this->mysqli->query($data_services);
		while($row_services=mysqli_fetch_array($hasil_services)){
		$result_services[] = $row_services;
		}
		return $result_services;
		}

		public function get_show_services_description(){
		$language = isset($_GET['lang'])? $_GET['lang']:null;
		switch($language){
			default :
			case "in":
			$data_services = "SELECT * FROM tbl_services WHERE lang_services='in' ORDER BY id_services DESC LIMIT 1";
			break;

			case "en":
			$data_services = "SELECT * FROM tbl_services WHERE lang_services='en' ORDER BY id_services DESC LIMIT 1";
			break;
		}
		$hasil_services = $this->mysqli->query($data_services);
		while($row_services=mysqli_fetch_array($hasil_services)){
			$result_services[] = $row_services;
		}
		return $result_services;
		}

		public function get_show_services_harga(){
		$language = isset($_GET['lang'])? $_GET['lang']:null;
		switch($language){
			default :
			case "in":
			$data_services = "SELECT * FROM tbl_services WHERE lang_services='in' ORDER BY id_services";
			break;

			case "en":
			$data_services = "SELECT * FROM tbl_services WHERE lang_services='en' ORDER BY id_services";
			break;
		}
		$hasil_services = $this->mysqli->query($data_services);
		while($row_services=mysqli_fetch_array($hasil_services)){
			$result_services[] = $row_services;
		}
		return $result_services;
		}
		
		//fungsi menampilkan isi data dari tbl_services
		public function get_show_promo(){
			$language = isset($_GET['lang'])? $_GET['lang']:null;
			switch($language){
				default :
				case "in":
				$data_promo = "SELECT * FROM tbl_promo WHERE lang_promo='in' ORDER BY id_promo DESC";
				break;
	
				case "en":
				$data_promo = "SELECT * FROM tbl_promo WHERE lang_promo='en' ORDER BY id_promo DESC";
				break;
			}
			$hasil_promo = $this->mysqli->query($data_promo);
			while($row_promo=mysqli_fetch_array($hasil_promo)){
			$result_promo[] = $row_promo;
			}
			return $result_promo;
			}
	
			public function get_show_promo_description(){
			$language = isset($_GET['lang'])? $_GET['lang']:null;
			switch($language){
				default :
				case "in":
				$data_promo = "SELECT * FROM tbl_promo WHERE lang_promo='in' ORDER BY id_promo DESC LIMIT 1";
				break;
	
				case "en":
				$data_promo = "SELECT * FROM tbl_promo WHERE lang_promo='en' ORDER BY id_promo DESC LIMIT 1";
				break;
			}
			$hasil_promo = $this->mysqli->query($data_promo);
			while($row_promo=mysqli_fetch_array($hasil_promo)){
				$result_promo[] = $row_promo;
			}
			return $result_promo;
			}
	
			public function get_show_promo_harga(){
			$language = isset($_GET['lang'])? $_GET['lang']:null;
			switch($language){
				default :
				case "in":
				$data_promo = "SELECT * FROM tbl_promo WHERE lang_promo='in' ORDER BY id_promo";
				break;
	
				case "en":
				$data_promo = "SELECT * FROM tbl_promo WHERE lang_promo='en' ORDER BY id_promo";
				break;
			}
			$hasil_promo = $this->mysqli->query($data_promo);
			while($row_promo=mysqli_fetch_array($hasil_promo)){
				$result_promo[] = $row_promo;
			}
			return $result_promo;
			}

	//fungsi menampilkan isi data dari tbl_aboutus
		public function get_show_aboutus_description(){
		$language = isset($_GET['lang'])? $_GET['lang']:null;
		switch($language){
			default :
			case "in":
			$data_aboutus = "SELECT DISTINCT description_aboutus FROM tbl_aboutus WHERE lang_aboutus='in' ORDER BY id_aboutus DESC";
			break;

			case "en":
			$data_aboutus = "SELECT DISTINCT description_aboutus FROM tbl_aboutus WHERE lang_aboutus='en' ORDER BY id_aboutus DESC";
			break;
		}
		$hasil_aboutus = $this->mysqli->query($data_aboutus);
		while($row_aboutus=mysqli_fetch_array($hasil_aboutus)){
			$result_aboutus[] = $row_aboutus;
		}
		return $result_aboutus;
		}

	    public function get_show_aboutus(){
		$language = isset($_GET['lang'])? $_GET['lang']:null;
		switch($language){
			default :
			case "in":
			$data_aboutus = "SELECT * FROM tbl_aboutus WHERE lang_aboutus='in' ORDER BY id_aboutus DESC ";
			break;

			case "en":
			$data_aboutus = "SELECT * FROM tbl_aboutus WHERE lang_aboutus='en' ORDER BY id_aboutus DESC ";
			break;
		}
		$hasil_aboutus = $this->mysqli->query($data_aboutus);
		while($row_aboutus=mysqli_fetch_array($hasil_aboutus)){
			$result_aboutus[] = $row_aboutus;
		}
		return $result_aboutus;
		}

		public function get_show_aboutus_detail(){
		$language = isset($_GET['lang'])? $_GET['lang']:null;
		switch($language){
			default :
			case "in":
			$data_aboutus = "SELECT * FROM tbl_aboutus WHERE lang_aboutus='in' ORDER BY id_aboutus";
			break;

			case "en":
			$data_aboutus = "SELECT * FROM tbl_aboutus WHERE lang_aboutus='en' ORDER BY id_aboutus";
			break;
		}
		$hasil_aboutus = $this->mysqli->query($data_aboutus);
		while($row_aboutus=mysqli_fetch_array($hasil_aboutus)){
			$result_aboutus[] = $row_aboutus;
		}
		return $result_aboutus;
		}


	//fungsi menampilkan isi data dari tbl_contactus
		public function get_show_contactus(){
		$language = isset($_GET['lang'])? $_GET['lang']:null;
		switch($language){
			default :
			case "in":
			$data_contactus = "SELECT * FROM tbl_contactus WHERE lang_contactus='in' ORDER BY id_contactus";
			break;

			case "en":
			$data_contactus = "SELECT * FROM tbl_contactus WHERE lang_contactus='en' ORDER BY id_contactus";
			break;
		}
		$hasil_contactus = $this->mysqli->query($data_contactus);
		while($row_contactus=mysqli_fetch_array($hasil_contactus)){
			$result_contactus[] = $row_contactus;
		}
		return $result_contactus;
		}


		//fungsi menampilkan isi data dari tbl_gallery
		public function get_show_gallery(){
		$data_gallery = "SELECT DISTINCT category_gallery FROM tbl_gallery ORDER BY id_gallery DESC";
		$hasil_gallery = $this->mysqli->query($data_gallery);
		while($row_gallery=mysqli_fetch_array($hasil_gallery)){
			$result_gallery[] = $row_gallery;
		}
		return $result_gallery;
		}

		public function get_show_gallery_detail(){
		$data_gallery = "SELECT * FROM tbl_gallery ORDER BY id_gallery DESC";
		$hasil_gallery = $this->mysqli->query($data_gallery);
		while($row_gallery=mysqli_fetch_array($hasil_gallery)){
			$result_gallery[] = $row_gallery;
		}
		return $result_gallery;
		}


		
}
?>