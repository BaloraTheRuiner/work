<?php include "header.php" ?>

	<div class="middle_content">
		<div class="inner_middle_content">
			<div class="left_content">
					<div class="blockTitle">
						<div class="titleIcon grammarPos"><img src="images/test.png" alt=""></div>
						<div class="doubleBorderStyle grammarPos">
							<div>Test: From Beginner to Advanced</div>
						</div>
					</div>
				<div class="tests">

					<table>
						<?php 
							$user_test_info = $db->testUserInfo($_SESSION["id"]);
							$user_rating 	= $db->userNewInfo($_SESSION["id"]);
							$sum			= 0;						
						?>
						<tr>

							<!-- //////////////////////////////////////////////////////// -->
							<?php 
									if ( $user_rating[0]["rating"] >= 0  && $user_test_info[0]["type"] == "unlock")
									{    							
							?>			
										<td><img src="images/skull1.png" data-sum="6000" class="static_test" data-test-id="1" data-level="1" data-type="unlock" alt=""><br>Level 1</td>
							<?php 	} else { ?>
										<td>
											<img class="absoluteChainLock" src="images/chains.png" alt="">
											<img src="images/skull1.png" data-sum="6000" class="" data-test-id="1" data-level="1" data-type="unlock" alt=""><br>Level 1
										</td>
							<?php 	} ?>
										<td><img src="images/points.png" alt=""></td>

							<!-- //////////////////////////////////////////////////////// -->
							<?php 
									if ( $user_rating[0]["rating"] >= 6000  && $user_test_info[1]["type"] == "unlock")
									{    							
							?>			
										<td><img src="images/skull2.png" data-sum="12000" class="static_test" data-test-id="2" data-level="2" data-type="unlock" alt=""><br>Level 2</td>
							<?php 	} else { ?>
										<td>
											<img class="absoluteChainLock" src="images/chains.png" alt="">
											<img src="images/skull1.png" data-sum="12000" class="" data-test-id="2" data-level="2" data-type="unlock" alt=""><br>Level 2
										</td>
							<?php 	} ?>
										<td><img src="images/points.png" alt=""></td>

							<!-- //////////////////////////////////////////////////////// -->
							<?php 
									if ( $user_rating[0]["rating"] >= 12000  && $user_test_info[2]["type"] == "unlock")
									{    							
							?>			
										<td><img src="images/skull3.png" data-sum="18000" class="static_test" data-test-id="3" data-level="3" data-type="unlock" alt=""><br>Level 3</td>
							<?php 	} else { ?>
										<td>
											<img class="absoluteChainLock" src="images/chains.png" alt="">
											<img src="images/skull1.png" data-sum="18000" class="" data-test-id="3" data-level="3" data-type="unlock" alt=""><br>Level 3
										</td>
							<?php 	} ?>
										<td><img src="images/points.png" alt=""></td>

							<!-- //////////////////////////////////////////////////////// -->
							<?php 
									if ( $user_rating[0]["rating"] >= 18000  && $user_test_info[3]["type"] == "unlock")
									{    							
							?>			
										<td><img src="images/skull4.png" data-sum="24000" class="static_test" data-test-id="4" data-level="4" data-type="unlock" alt=""><br>Level 4</td>
							<?php 	} else { ?>
										<td>
											<img class="absoluteChainLock" src="images/chains.png" alt="">
											<img src="images/skull1.png" data-sum="24000" class="" data-test-id="4" data-level="4" data-type="unlock" alt=""><br>Level 4
										</td>
							<?php 	} ?>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td><img src="images/pointsDown.png" alt=""></td>
						</tr>
						<tr>

							<!-- //////////////////////////////////////////////////////// -->
							<?php 
									if ( $user_rating[0]["rating"] >= 30750  && $user_test_info[7]["type"] == "unlock")
									{ 
							?>
										<td><img src="images/skull8.png" data-sum="33000" class="static_test" data-test-id="8" data-level="8" data-type="unlock" alt=""><br>Level 8</td>
							<?php 	} else { ?>
										<td>
											<img class="absoluteChainLock" src="images/chains.png" alt="">
											<img src="images/skull8.png" data-sum="33000" class="" data-test-id="8" data-level="8" data-type="unlock" alt=""><br>Level 8
										</td>
							<?php 	}  ?>
									<td><img src="images/points.png" alt=""></td>

							<!-- //////////////////////////////////////////////////////// -->
							<?php 
									if ( $user_rating[0]["rating"] >= 28500 && $user_test_info[6]["type"] == "unlock")
									{ 
							?>
										<td><img src="images/skull7.png" data-sum="30750" class="static_test" data-test-id="7" data-level="7" data-type="unlock" alt=""><br>Level 7</td>
							<?php 	} else { ?>
										<td>
											<img class="absoluteChainLock" src="images/chains.png" alt="">
											<img src="images/skull7.png" data-sum="30750" class="" data-test-id="7" data-level="7" data-type="unlock" alt=""><br>Level 7
										</td>
							<?php 	}  ?>
									<td><img src="images/points.png" alt=""></td>

							<!-- //////////////////////////////////////////////////////// -->
							<?php 
									if ( $user_rating[0]["rating"] >= 26250 && $user_test_info[5]["type"] == "unlock")
									{ 
							?>
										<td><img src="images/skull6.png" data-sum="28500" class="static_test" data-test-id="6" data-level="6" data-type="unlock" alt=""><br>Level 6</td>
							<?php 	} else { ?>
										<td>
											<img class="absoluteChainLock" src="images/chains.png" alt="">
											<img src="images/skull6.png" data-sum="28500" class="" data-test-id="6" data-level="6" data-type="unlock" alt=""><br>Level 6
										</td>
							<?php 	}  ?>
									<td><img src="images/points.png" alt=""></td>

							<!-- //////////////////////////////////////////////////////// -->
							<?php 
									if ( $user_rating[0]["rating"] >= 24000  && $user_test_info[4]["type"] == "unlock")
									{ 
							?>
										<td><img src="images/skull5.png" data-sum="26250" class="static_test" data-test-id="5" data-level="5" data-type="unlock" alt=""><br>Level 5</td>
							<?php 	} else { ?>
										<td>
											<img class="absoluteChainLock" src="images/chains.png" alt="">
											<img src="images/skull5.png" data-sum="26250" class="" data-test-id="5" data-level="5" data-type="unlock" alt=""><br>Level 5
										</td>
							<?php 	}  ?>
							
						</tr>
						<tr>
							<td><img src="images/pointsDown.png" alt=""></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>

							<!-- //////////////////////////////////////////////////////// -->
							<?php 
									if ( $user_rating[0]["rating"] >= 33000  && $user_test_info[8]["type"] == "unlock")
									{ 
							?>
										<td><img src="images/skull9.png" data-sum="34500" class="static_test" data-test-id="9" data-level="9" data-type="unlock" alt=""><br>Level 9</td>
							<?php 	} else { ?>
										<td>
											<img class="absoluteChainLock" src="images/chains.png" alt="">
											<img src="images/skull9.png" data-sum="34500" class="" data-test-id="9" data-level="9" data-type="unlock" alt=""><br>Level 9
										</td>
							<?php 	}?>
										<td><img src="images/points.png" alt=""></td>

							<!-- //////////////////////////////////////////////////////// -->
							<?php 
									if ( $user_rating[0]["rating"] >= 34500  && $user_test_info[9]["type"] == "unlock")
									{ 
							?>
										<td><img src="images/skull10.png" data-sum="36000" class="static_test" data-test-id="10" data-level="10" data-type="unlock" alt=""><br>Level 10</td>
							<?php 	} else { ?>
										<td>
											<img class="absoluteChainLock" src="images/chains.png" alt="">
											<img src="images/skull10.png" data-sum="36000" class="" data-test-id="10" data-level="10" data-type="unlock" alt=""><br>Level 10
										</td>
							<?php 	}?>
										<td><img src="images/points.png" alt=""></td>

							<!-- //////////////////////////////////////////////////////// -->
							<?php 
									if ( $user_rating[0]["rating"] >= 36000  && $user_test_info[10]["type"] == "unlock")
									{ 
							?>
										<td><img src="images/skull11.png" data-sum="37500" class="static_test" data-test-id="11" data-level="11" data-type="unlock" alt=""><br>Level 11</td>
							<?php 	} else { ?>
										<td>
											<img class="absoluteChainLock" src="images/chains.png" alt="">
											<img src="images/skull11.png" data-sum="37500" class="" data-test-id="11" data-level="11" data-type="unlock" alt=""><br>Level 11
										</td>
							<?php 	}?>
										<td><img src="images/points.png" alt=""></td>

							<!-- //////////////////////////////////////////////////////// -->
							<?php 
									if ( $user_rating[0]["rating"] >= 37500  && $user_test_info[11]["type"] == "unlock")
									{ 
							?>
										<td><img src="images/skull12.png" data-sum="39000" class="static_test" data-test-id="12" data-level="12" data-type="unlock" alt=""><br>Level 12</td>
							<?php 	} else { ?>
										<td>
											<img class="absoluteChainLock" src="images/chains.png" alt="">
											<img src="images/skull12.png" data-sum="39000" class="" data-test-id="12" data-level="12" data-type="unlock" alt=""><br>Level 12
										</td>
							<?php 	}?>
						</tr>
					</table>
					<br><br>
					<!-- <div class="blockTitle">
						<div class="titleIcon grammarPos"><img src="images/test.png" alt=""></div>
						<div class="doubleBorderStyle grammarPos">
							<div>Թեստ։ Ուտելիք և հագուստ</div>
						</div>
					</div>
					<table>
						<tr>
							<td><img src="images/apple1.png" alt=""><br>Level 1</td>
							<td><img src="images/points.png" alt=""></td>
							<td><img src="images/apple2.png" alt=""><br>Level 2</td>
							<td><img src="images/points.png" alt=""></td>
							<td>
								<img class="absoluteChainLock" src="images/chains.png" alt="">
								<img src="images/apple3.png" alt=""><br>Level 3
							</td>
							<td><img src="images/points.png" alt=""></td>
							<td>
								<img class="absoluteChainLock" src="images/chains.png" alt="">
								<img src="images/apple4.png" alt=""><br>Level 4
							</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td><img src="images/clothes1.png" alt=""><br>Level 1</td>
							<td><img src="images/points.png" alt=""></td>
							<td>
								<img class="absoluteChainLock" src="images/chains.png" alt="">
								<img src="images/clothes2.png" alt=""><br>Level 2
							</td>
							<td><img src="images/points.png" alt=""></td>
							<td>
								<img class="absoluteChainLock" src="images/chains.png" alt="">
								<img src="images/clothes3.png" alt=""><br>Level 3
							</td>
							<td><img src="images/points.png" alt=""></td>
							<td>
								<img class="absoluteChainLock" src="images/chains.png" alt="">
								<img src="images/clothes4.png" alt=""><br>Level 4
							</td>
						</tr>
					</table> -->
					<input class="user_id_for_test" type="hidden" value="<?= $_SESSION['id'] ?>">
				</div>
			</div>

<?php include "rightContent.php" ?>		
		</div>
	</div>

<?php include "footer.php" ?>