<?php

class WebForms
{

    static function renderStudentQuery()
    {
	return '
<form method="post" action="index.php?pageID=studentQuery">
    <div class="form-group">
	<label for="' . FormTags::StudentQueryIdInput . '">Student ID:</label>
	<input type="text" class="form-control" id="' . FormTags::StudentQueryIdInput . '" name="' . FormTags::StudentQueryIdInput . '">
    </div>
    <button type="submit" class="btn btn-default"  value="studentQuery" name="' . FormTags::StudentQueryButton . '">Submit</button>
</form>';
    }

    static function renderLogin()
    {
	return '<form method="post" action="index.php?pageID=login">
    <div class="form-group">
	<label for="' . FormTags::LoginUsernameInput . '">ID</label>
	<input type="text" class="form-control" id="' . FormTags::LoginUsernameInput . '" name="' . FormTags::LoginUsernameInput . '">
	<label for="' . FormTags::LoginPasswordInput . '">Password</label>
	<input type="password" class="form-control" id="' . FormTags::LoginPasswordInput . '" name="' . FormTags::LoginPasswordInput . '">
    </div>
    <button type="submit" class="btn btn-default" value="TRUE" name="' . FormTags::LoginButton . '">Login</button>
</form>';
    }

}
