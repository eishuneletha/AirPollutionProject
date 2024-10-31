<?php  
include('Connect.php');
$deleteuser="Drop table users";
$delrun=mysqli_query($connect,$deleteuser);

 if ($delrun) 
 {
 	echo "<p>User table deleted</p>";
}

else
{
	echo mysqli_error($connect);
 }

$createuser="Create table users 
			(
				UserID int  auto_increment primary key,
				UserName varchar (100),
				FirstName varchar (100),
				LastName varchar (100),
				Email varchar (255),
				Password varchar (100),
				DateOfBirth varchar (100),
				Address varchar (100),
				PostCode int

			)
		";

$curun=mysqli_query($connect,$createuser);

if ($curun) 
{
	echo "<p>User table created</p>";
}

else
{
	echo "<script>window.alert('Something went wrong')</script>";
	echo mysqli_error($connect);
}

 $insertuser="Insert into users(UserID,UserName,FirstName,LastName,Email,Password,DateOfBirth,Address,PostCode) values (1,'Regina','Regina','George','reginageorge@gmail.com','Jill','8/17/2003','Racoon City','456')";
$irun=mysqli_query($connect,$insertuser);
 if ($irun) 
{
 	echo "<p>User table inserted</p>";
}

 else
 {
 	echo mysqli_error($connect);
}

// --------------------------------------------------------------------------------------------------------------------------------------------

$deleteadmin="Drop table admin";
$deladminrun=mysqli_query($connect,$deleteadmin);

if ($deladminrun) 
{
	echo "Admin Table deleted successfully";
}

else
{
	echo "Something went wrong";
	echo mysqli_error($connect);
}


$createadmin="Create Table admin
			(
				AdminID int  auto_increment primary key,
				AdminName varchar (100),
				UserName varchar (100),
				Email varchar (255),
				Password varchar (100)

			)";

$carun=mysqli_query($connect,$createadmin);

if ($carun) 
{
	echo "<p>Admin table created successfully</p>";
}

else
{
	echo "Something went wrong";
	echo mysqli_error($connect);
}


$insertadmin="Insert into admin(AdminID,AdminName,UserName,Email,Password) values(1,'Kim Namjoon','Namtiddies','thiccjoon@gmail.com','Namtiddies')";
$iadminrun=mysqli_query($connect,$insertadmin);

if ($iadminrun) 
{
	echo "Admin inserted successfully";
}

else
{
	echo "Something went wrong";
	echo mysqli_error($connect);
}

//----------------------------------------------------------------------------------------------------------------------------------------------------------
$delfaq="Drop table faq";
$delfaqrun=mysqli_query($connect,$delfaq);

if ($delfaqrun) 
{
	echo "<p>Faq table deleted successfully</p>";
}

else
{
	echo "Something went wrong";
	echo mysqli_error($connect);
}

$faqcreate="Create table faq
			(
				FaqID int  auto_increment primary key,
				AdminID int,
				Question varchar (255),
				Answer varchar (255)

			)";

$faqcreaterun=mysqli_query($connect,$faqcreate);

if ($faqcreaterun) 
{
	echo "<p>Faq table created successfully</p>";
}

else 
{
	echo "Something went wrong";
	echo mysqli_error($connect);
}

$finsert="Insert into faq (FaqID,AdminID,Question,Answer) values (1,1,'What are 3 main causes of air pollution?','The Burning of Fossil Fuels,Agricultural Activitie')";
$finsertrun=mysqli_query($connect,$finsert);

if ($finsertrun) 
{
	echo "<p>Faq table insert successful</p>";
}

else 
{
	echo "Something went wrong";
	echo mysqli_error($connect);
}


//----------------------------------------------------------------------------------------------------------------------------------------------------------------
$deletecontact="Drop table contactfaq";
$deletecontactrun=mysqli_query($connect,$deletecontact);

if ($deletecontactrun) 
{
	echo "contactfaq table deleted successfully";
}

else 
{
	echo "Something went wrong";
	echo mysqli_error($connect);
}

$createcontactfaq="Create table contactfaq
				(
					QuestionID int  auto_increment primary key,
					Question varchar (255),
					UserID int
				)";

$createcontactfaqrun=mysqli_query($connect,$createcontactfaq);

if ($createcontactfaqrun) 
{
	echo "<p>Contactfaq table created successfully</p>";
}

else 
{
	echo "Something went wrong";
	echo mysqli_error($connect);
}

$icontact="Insert into contactfaq(QuestionID,Question,UserID) values (1,'What is responsible for air pollution?
',1)";

$icontactrun=mysqli_query($connect,$icontact);

if ($icontactrun) 
{
	echo "Contactfaq table inserted successfully";
}

else 
{
	echo "Something went wrong";
	echo mysqli_error($connect);
}

//----------------------------------------------------------------------------------------------------------------------------------------

$deletereply="Drop table reply";
$delreplyrun=mysqli_query($connect,$deletereply);

if ($delreplyrun) 
{
	echo "<p>Reply table deleted</p>";
}

else
{
	echo "Something went wrong";
	echo mysqli_error($connect);
}

$createreply="Create table reply
			(
				ReplyID int auto_increment primary key,
				AdminID int,
				QuestionID int,
				Answer varchar (255),
				ReplyDate varchar (100)
			)";

$createreplyrun=mysqli_query($connect,$createreply);

if ($createreplyrun) 
{
	echo "<p>Reply table created</p>";
}

else
{
	echo "<p>Something went wrong</p>";
	echo mysqli_error($connect);
}

$insertreply="Insert into reply(AdminID, QuestionID, Answer,ReplyDate) values(1,1,'The main sources of air pollution are the industries, agriculture and traffic, as well as energy generation. During combustion processes and other production processes air pollutants are emitted...

Read more: ','2020/08/23')";
$insertreplyrun=mysqli_query($connect,$insertreply);

if ($insertreplyrun) 
{
	echo "<p>Reply data inserted</p>";
}

else
{
	echo "Something went wrong";
	echo mysqli_error($connect);
}

//------------------------------------------------------------------------------------------------------------------------

$deletecampaign="Drop table campaigns";
$delcamrun=mysqli_query($connect,$deletecampaign);

if ($delcamrun) 
{
	echo "<p>Campaign table deleted</p>";
}

else
{
	echo "Something went wrong";
	echo mysqli_error($connect);
}

$createcampaign="Create table campaigns
				(
					CampaignID int auto_increment primary key,
					CampaignTitle varchar (255),
					Description varchar (255),
					Image varchar (255)
				)";
$createcampaignrun=mysqli_query($connect,$createcampaign);

if ($createcampaignrun) 
{
	echo "<p>Campaign table created</p>";
}

else
{
	echo "<p>Something went wrong</p>";
	echo mysqli_error($connect);
}

$insertcampaign="Insert into campaigns (CampaignTitle,Description,Image) values ('Planting Trees','Volunteer in planting trees for our mother nature','Images/SaveOurEarth.jpg')";
$insertcampaignrun=mysqli_query($connect,$insertcampaign);

if ($insertcampaignrun) 
{
	echo "<p>campaign table inserted</p>";
}

else
{
	echo "Something went wrong";
	echo mysqli_error($connect);
}

/*-----------------------------------------------------------------------------------------------------------------------------------------------*/

$deletecampaignsignup="Drop table campaignsignup";
$deletecampaignsignuprun=mysqli_query($connect,$deletecampaignsignup);

if ($deletecampaignsignuprun) 
{
	echo "<p>CampaignSignup table deleted successfully</p>";
}

else
{
	echo "<p>Something went wrong</p>";
	echo mysqli_error($connect);
}

$createcamsignup="Create table campaignsignup
					(
						UserID int,
						CampaignID int, 
						Date date
					)";
$createcamsignuprun=mysqli_query($connect,$createcamsignup);

if ($createcamsignuprun) 
{
	echo "<p>Campaignsignup table created successfully</p>";
}

else
{
	echo "<p>Something went wrong</p>";
	echo mysqli_error($connect);
}


$insertcamsgu="Insert into campaignsignup values (1,1,'2020/10/5')";
$insertcamsgurun=mysqli_query($connect,$insertcamsgu);

if ($insertcamsgurun) 
{
	echo "<p>Campaignsignup table inserted successfully</p>";
}

else
{
	echo "<p>Something went wrong</p>";
	echo mysqli_error($connect);
}

/*------------------------------------------------------------------------------------------------------*/
$deletecities="Drop table cities";
$deletecitiesrun=mysqli_query($connect,$deletecities);

if ($deletecitiesrun) 
{
	echo "<p>Cities table deleted successfully</p>";
}

else
{
	echo "<p>Something went wrong</p>";
	echo mysqli_error($connect);
}

$createcities="Create table cities
				(
					CityID int auto_increment primary key,
					CityName varchar (255),
					CityImage varchar (255),
					Description varchar (255),
					Population varchar (30),
					PollutionRate varchar (255),
					Area varchar (255),
					MainAttraction varchar (255),
					Date varchar (255)
				)
				";
$createcitiesrun=mysqli_query($connect,$createcities);
if ($createcitiesrun) 
{
	echo "<p>Cities table created successfully</p>";
}

else
{
	echo "<p>Something went wrong</p>";
	echo mysqli_error($connect);
}

$insertcities="Insert into cities (CityName,CityImage,Description,Population,PollutionRate,Area,MainAttraction,Date) values ('New York','Images/nyc3.jpeg','New York City comprises 5 boroughs sitting where the Hudson River meets the Atlantic Ocean. At its core is Manhattan, a densely populated borough that’s among the world’s major commercial, financial and cultural centers.','8.399 million','67%','Where Hudson river and Atlantic ocean meets','Statute of liberty national monument','2020/10/5')";
$insertcitiesrun=mysqli_query($connect,$insertcities);

if ($insertcitiesrun) 
{
	echo "<p>Cities inserted successfully</p>";
}

else
{
	echo "<p>Something went wrong</p>";
	echo mysqli_error($connect);
}

/*----------------------------------------------------------------------------------------------------------------------------------------------*/
$delhistory="Drop table history";
$delhistoryrun=mysqli_query($connect,$delhistory);

if ($delhistoryrun) 
{
	echo "<p>History table deleted successfully</p>";
}

else
{
	echo "<p>Something went wrong</p>";
	echo mysqli_error($connect);
}

$createhistory="Create table history
				(
					HistoryID int auto_increment primary key,
					UserID int, 
					SearchData varchar (255),
					Date date 

				)";

$createhistoryrun=mysqli_query($connect,$createhistory);

if ($createhistoryrun) 
{
	echo "<p>History table created successfully</p>";
}

else
{
	echo "<p>Something went wrong</p>";
	echo mysqli_error($connect);
}

$inserthistory="Insert into history (UserID,SearchData,Date) values (1,'New York','2020/10/5')";
$inserthistoryrun=mysqli_query($connect,$inserthistory);

if ($inserthistoryrun) 
{
	echo "<p>History inserted successfully</p>";
}

else
{
	echo "<p>Something went wrong</p>";
	echo mysqli_error($connect);
}

#---------------------------------------------------------------------------------------------------------------------------------------------
$deleinfo="Drop Table information";
$deleinforun=mysqli_query($connect,$deleinfo);

if ($deleinforun) 
{
	echo "<p>information table deleted successfully</p>";
}

else
{
	echo "<p>Something went wrong</p>";
	echo mysqli_error($connect);
}

$createinfo="Create table information
				(
					InfoID int auto_increment primary key,
					Title varchar (255),
					Image varchar (255),
					Content varchar (255),
					AdminID int, 
					Date date

				)";
$createinforun=mysqli_query($connect,$createinfo);

if ($createinforun) 
{
	echo "<p>Information table created successfully</p>";
}

else 
{
	echo "Something went wrong";
	echo mysqli_error($connect);
}


$insertinfo="Insert into information (Title,Image,Content,AdminID,Date) values ('How can we protect ourselves from the effects of air pollution','Images/health.png','Move your physical activities indoors Change your physical activity to something less intense (for example, walking instead of jogging) Shorten the amount of time that you’re physically active',1,'2020/10/5')";
$insertinforun=mysqli_query($connect,$insertinfo);

if ($insertinforun)
{
	echo "<p>Information table inserted successfully</p>";
}

else 
{
	echo "Something went wrong";
	echo mysqli_error($connect);
}

#-----------------------------------------------------------------------------------------------------------------------------------------
$delkit="Drop table kits";
$delkitrun=mysqli_query($connect,$delkit);
if ($delkitrun) 
{
	echo "<p>Kit table deleted successfully</p>";
}

else 
{
	echo "<p>Something went wrong</p>";
	echo mysqli_error($connect);
}

$createkit="Create table kits
			(
				KitID int auto_increment primary key,
				KitName varchar (255),
				Accessories varchar (255),
				Description varchar (255),
				KitImage varchar (255)
			)";
$createkitrun=mysqli_query($connect,$createkit);

if ($createkitrun) 
{
	echo "<p>Kit table created successfully</p>";
}

else 
{
	echo "<p>Something went wrong</p>";
	echo mysqli_error($connect);
}

$insertkit="Insert into kits (KitName,Accessories,Description,KitImage) values ('Outdoor Air Quality Test Kit','-Industrial Enclosure For Air Quality Monitors
-Large Portable Monitor Carry Case
-Temperature & Humidity Sensor
-Lithium Battery Pack
-Small Portable Monitor Carry Case
-Wall Bracket
-IP41 Remote Sensor Kit
-Remote Sensor Kit
-Cigarette Light Ada','-Easy-to-use air quality testing kit with everything required to get started measuring key outdoor pollutants
-Series 500 monitor with inbuilt real-time data logger
-Active fan sampling sensor heads (PM2.5/PM10, NO2, O3) ensure high accuracy measurement','Images/kit.jpg')";
$insertkitrun=mysqli_query($connect,$insertkit);

if ($insertkitrun) 
{
	echo "<p>Kit table inserted successfully</p>";
}

else 
{
	echo "<p>Something went wrong</p>";
	echo mysqli_error($connect);
}

#---------------------------------------------------------------------------------------------------------------------------------------------
$delkdet="Drop table kitdetail";
$delkdetrun=mysqli_query($connect,$delkdet);

if ($delkdetrun)
{
	echo "<p>Kit detail table deleted successfully</p>";
}


else 
{
	echo "Something went wrong";
	echo mysqli_error($connect);
}

$kdetcreate="Create table kitdetail
				(
					UserID int,
					KitId int,
					DeliveryAddress varchar (255),
					Date date
				)
			";
$kdetcreaterun=mysqli_query($connect,$kdetcreate);
if ($kdetcreaterun) 
{
	echo "<p>Kitdetail table created successfully</p>";
}

else 
{
	echo "Something went wrong";
	echo mysqli_error($connect);
}

$insertkdet="Insert into kitdetail values (1,1,'New York','2020/10/5')";
$insertkdetrun=mysqli_query($connect,$insertkdet);
if ($insertkdetrun) 
{
	echo "<p>Kit detail table inserted successfully</p>";
}


else 
{
	echo "<p>Something went wrong</p>";
	echo mysqli_error($connect);
}

#-------------------------------------------------------------------------------------------------------------------------
























































































































?>


