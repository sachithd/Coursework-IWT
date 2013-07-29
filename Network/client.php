<?php
/*  Coursework Assignment IWT
	UDP Client
	M G S Dassanayake (12712980)
	References: Example #1 http://php.net/manual/en/function.socket-recvfrom.php
*/

$srvIP = $argv[1];   // Remote Server IP address (Argument 1)
$srvPort = $argv[2]; // Remote Server Port (Argument 2)

if ($argv[1] == "" || $argv[2] == "")
{
	echo "Invalid Server IP Or port Number. Please run the program with the correct ip address and the port number. (Eg: client.php 127.0.0.1 8088)";
}
else
{
	//Creates the UDP Socket
	$sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP); 
	
	if(!$sock) 
	{ 
	   echo 'Socket_create failed: '.socket_strerror(socket_last_error())."\n";
	}
	else
	{
		// Socket Connect
		$result = socket_connect($sock, $srvIP, $srvPort); 		
		if($result)
		{  
			do{	
				$msg = trim(fgets(STDIN)); 	//  Keyboard Input
				$len = strlen($msg); 		//	Length of the input
				
				// Sends the input message to the server
				socket_sendto($sock, $msg, $len, 0, $srvIP, $srvPort); 
									
				// Receives the message from the server
				socket_recvfrom($sock, $buf, 2048, 0, $srvIP, $srvPort); 
				
				//Shows the message received from the server including the ip address and the port
				echo $srvIP . " " . $srvPort. " " . trim($buf) . PHP_EOL; 
				
				//Clears the buffer
				$buf = ""; 

			}while($msg!= "quit"); // Exit the application when the user type 'quit'
		}

	}
	//Close the socket
	socket_close($sock);
}
	
?>

