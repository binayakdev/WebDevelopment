<?php
/**
Author: Binayak Dev Joshi
Last Updated: 5th May 2019
**/

	$servername = "localhost";   //setting the server name
	$username = "root";			//setting the username of the database	
	$password = "";				//setting the password of the database
	$dbname = "itsolutions";	//setting the database name

	$conn = new mysqli($servername, $username, $password, $dbname); //connecting to the database

	//checking if connection error persists
	if ($conn->connect_error)
	{
		die ("Connection failed: ".$conn->connect_error); //eching the conenction error
	}else
	{
		echo "Sucessfully connected"; //echoing the success message
		$xml = new DomDocument("1.0"); //creating a new XML document
		$xml->formatOutput = true; //formatting the XML

		$company = $xml->createElement("ITCompany"); //creating the root element of the XML document
		$xml->appendChild($company); //appending the root element in the XML document

		//retrieving company details from the database
		$company_details = "SELECT * FROM company";
		$result = mysqli_query($conn, $company_details);

		//creating XML element for all the database data
		while($row = mysqli_fetch_assoc($result))
		{
			//creating the detail element for the company tag
			$detail = $xml->createElement("Details");
			$company->appendChild($detail);

			//creating element for name, address, url, telephone number and logo of the company
			$company_name = $xml->createElement("Name", $row['Name']);
			$company_address = $xml->createElement("Address", $row['Address']);
			$company_url = $xml->createElement("URL", $row['URL']);
			$company_tele_number = $xml->createElement("TelephoneNumber", $row['Number']);
			$company_logo = $xml->createElement("Logo");

			//appending the elements in the details tag
			$detail->appendChild($company_logo);
			$detail->appendChild($company_name);
			$detail->appendChild($company_address);
			$detail->appendChild($company_tele_number);
			$detail->appendChild($company_url);
		}

		//retreiving the CEO details from the database
		$ceo_details = "SELECT * FROM supervisor WHERE Title='CEO'";
		$result = mysqli_query($conn, $ceo_details);
		$row = mysqli_fetch_assoc($result);
		$ceo_details = $xml->createElement("CEO"); //creating the CEO element inside the root element

		//creating the element for photo of the CEO
		$logo = $xml->createElement("Photo");
		$ceo_details->appendChild($logo); //appending in the CEO tag

		//creating the element for name of the CEO
		$ceo_name = $xml->createElement("Name", $row['Name']);
		$ceo_details->appendChild($ceo_name); //appending in the CEO tag

		//creating the element for title of the CEO
		$title = $xml->createElement("Title", $row['Title']);
		$ceo_details->appendChild($title); //appending in the CEO tag
		
		//if the phone of the CEO exists then creating its element and appending it to the CEO tag
		if ($row['Phone'] != null)
		{
			$phone = $xml->createElement("PhoneNumber", $row['Phone']);
			$ceo_details->appendChild($phone);
		}
		
		//creating the element for email of the CEO
		$ceo_details->setAttribute("Email", $row['Email']);
		$company->appendChild($ceo_details); //appending in the CEO tag


		//retreicing data for the supervisor or managers that works under CEO
		$supervisor = "SELECT * FROM supervisor";
		$result = mysqli_query($conn, $supervisor);

		/**
		creating tags for all the data that exists in the database
		the loop consists of tag of managing director, marketing director, human resource manager and project manager
		each tags has photo, name, title, phone number and email that is append in their respective parent child
		the parent child are then append to the CEO tag
		**/
		while ($row = mysqli_fetch_assoc($result))
		{	
			if ($row['Title'] == "CEO"){
				continue;
			}
			elseif ($row['Title'] == "Managing Director"){
				$supervisor_details = $xml->createElement("Manager");
				$supervisor_details->setAttribute("manager_id", "M1");
				$child = "ResearchandDevelopment";
			} elseif ($row['Title'] == "Marketing Manager") {
				$supervisor_details = $xml->createElement("Manager");
				$supervisor_details->setAttribute("manager_id", "M2");
				$child = "Marketing";
			} elseif ($row['Title'] == "Human Resource Manager"){
				$supervisor_details = $xml->createElement("Manager");
				$supervisor_details->setAttribute("manager_id", "M3");
				$child = "HumanResource";
			} else  {
				$supervisor_details = $xml->createElement("Manager");
				$supervisor_details->setAttribute("manager_id", "M4");
				$child = "WebDepartment";
				$child2 = "MobileDepartment";
			}

			//creating the tags for the details of the manager/supervisor and then appending it to the parent child (Manager tag).
			$photo = $xml->createElement("Photo");
			$supervisor_details->appendChild($photo);
			$name = $xml->createElement("Name", $row['Name']);
			$supervisor_details->appendChild($name);
			$title = $xml->createElement("Title", $row['Title']);
			$supervisor_details->appendChild($title);

			//creating the the phone tag for the managers that has phone number
			if ($row['Phone'] != null)
			{
				$phone = $xml->createElement("PhoneNumber", $row['Phone']);
				$supervisor_details->appendChild($phone);
			}
			
			$department = $xml->createElement($child);
			$supervisor_details->appendChild($department);
			

			//if the manager tag has an extra development i.e web development and mobile development (Project manager)
			//the tag gets appended to the tag
			if (isset($child2))
			{
				$department2 = $xml->createElement($child2);
				$supervisor_details->appendChild($department2);
			}

			$supervisor_details->setAttribute("Email", $row['Email']);
			$ceo_details->appendChild($supervisor_details);


			/**
			retreiving the team names for the research and development from the database
			creating the Team tag for the names
			appending it to reasearch and development parent tag
			***/
			if ($child == "ResearchandDevelopment")
			{
				$department_details = "SELECT * FROM `research and development`";
				$result1 = mysqli_query($conn, $department_details);

				while ($peopler = mysqli_fetch_assoc($result1))
				{
					$team = $xml->createElement("Team", $peopler['NAME']);
					$team->setAttribute("empID", $peopler['ID']);
					$department->appendChild($team);
				}
			} 
			/**
			retreiving the team names for the marketing from the database
			creating the Team tag for the names
			appending it to marketing parent tag
			***/
			elseif ($child == "Marketing")
			{
				$department_details = "SELECT * FROM marketing";
				$result1 = mysqli_query($conn, $department_details);

				while ($peoplem = mysqli_fetch_assoc($result1))
				{
					$team = $xml->createElement("Team", $peoplem['NAME']);
					$team->setAttribute("empID", $peoplem['ID']);
					$department->appendChild($team);
				}
		
			/**
			retreiving the team names for the human resource from the database
			creating the Team tag for the names
			appending it to human resource parent tag
			***/
			} elseif ($child == "HumanResource")
			{
				$department_details = "SELECT * FROM humanresource";
				$result1 = mysqli_query($conn, $department_details);

				$ul = $xml->createElement("ul");
			
				while ($peopleh = mysqli_fetch_assoc($result1))
				{
					$team = $xml->createElement("Team", $peopleh['NAME']);
					$team->setAttribute("empID", $peopleh['ID']);
					$department->appendChild($team);
				}
			
			/**
			retreiving the team names for the web department and mobile department from the database
			creating the Team tag for the names
			appending it to web department and mobile department parent tag
			***/	

			} elseif ($child == "WebDepartment" && isset($child2))
			{
				$department_details1 = "SELECT * FROM webdepartment";
				$department_details2 = "SELECT * FROM mobiledepartment";

				$result1 = mysqli_query($conn, $department_details1);
				$result2 = mysqli_query($conn, $department_details2);

				$sql1 = "SELECT TeamLeader from webdepartment LIMIT 1";
				$sql2 = "SELECT TeamLeader from mobiledepartment LIMIT 1";
				$item1 = mysqli_query($conn, $sql1);
				$leader1 = mysqli_fetch_assoc($item1);

				$item2 = mysqli_query($conn, $sql2);
				$leader2 = mysqli_fetch_assoc($item2);

				$department->appendChild($xml->createElement("TeamLeader", $leader1['TeamLeader']));
				$department2->appendChild($xml->createElement("TeamLeader", $leader2['TeamLeader']));

				while ($peoplewd = mysqli_fetch_assoc($result1))
				{
					$team1 = $xml->createElement("Team", $peoplewd['NAME']);
					$team1->setAttribute("empID", $peoplewd['ID']);

					if ($peoplewd['other'] != null)
					{
						$other1 = $xml->createElement("NonProgrammer", $peoplewd['other']);
						$team1->appendChild($other1);
					}

					$department->appendChild($team1);
				}	

				while ($people2md = mysqli_fetch_assoc($result2))
				{
					$team2 = $xml->createElement("Team", $people2md['NAME']);
					$team2->setAttribute("empID", $people2md['ID']);

					if ($people2md['other'] != null)
					{
						$other2 = $xml->createElement("NonProgrammer", $people2md['other']);
						$team2->appendChild($other2);
					}

					$department2->appendChild($team2);
				}		
			}
		}

		echo "<xmp>".$xml->saveXML()."</xmp>";

		$xml->save("catalog_17031105.xml"); //saving the XML document in a seprate file inside the working directory
	}
 ?>