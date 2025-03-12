<h1>This is about us!</h1>
<a href="/welcome">Back</a>
<hr>
<h5>Welcome : <span style="color: yellowgreen">{{ $name }}</span></h5>

<hr>
<h1>Component examples</h1>
<x-message-banner msg="About page - Login successfully!" cssClass="success"/>
<x-message-banner msg="About page - SignUp successfully!" cssClass="success"/>
<hr>

<x-message-banner msg="About page - Please enter correct password!!" cssClass="error"/>
<x-message-banner msg="About page - Always use complex password!!" cssClass="warning"/>

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