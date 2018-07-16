<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<table >
    <form name="enableForm" method="POST" accept-charset="utf-8">

	<tr>
		<th>Email Subject</th>
                <td>
                    <input type="text" name="em_sub"  required="" placeholder="Write Email Subject" id="em_sub">
                </td></tr>
        <tr>
		<th>Email Body</th>
                <td>
                    <textarea  rows="10" cols="40" placeholder="Write Email Content" name="em_b" id="em_b" required=""></textarea>
                   
                </td></tr>
       
        <tr><td colspan=2 align='center' width='195'> <input type='submit' name='Submit' value='Send Email' >

                </form></table><br><br>

