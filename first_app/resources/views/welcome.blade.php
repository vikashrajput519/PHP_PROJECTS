<h1>Welcome in home page of Laravel 11</h1>
<hr>
<a href="/about/PHP">Click here for About PHP</a>
<br>
<br>
<a href="/sendValueUrlToRoutesToView/This is value">Example of send value Url to view</a>
<br>
<br>
<a href="/getUser">Click here for example of printing value directly from controller.</a>
<br>
<br>
<hr>
<h1>Component examples!</h1>
<x-message-banner msg="Login successfully!" cssClass="success"/>
<x-message-banner msg="SignUp successfully!" cssClass="success"/>
<hr>

<x-message-banner msg="Please enter correct password!!" cssClass="error"/>
<x-message-banner msg="Always use complex password!!" cssClass="warning"/>

<style>
    .success {
        background-color: lightgreen;
        color:green;
        padding: 3px 10px;
        border-radius: 2px;
        display: inline-block;
        margin: 10px;
    }

    .error {
        background-color: #ff00002e;
        color:red;
        padding: 3px 10px;
        border-radius: 2px;
        display: inline-block;
        margin: 10px;
    }

    .warning {
        background-color: #ffa50054;
        color:orange;
        padding: 3px 10px;
        border-radius: 2px;
        display: inline-block;
        margin: 10px;
    }
</style>