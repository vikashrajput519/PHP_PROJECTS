<fieldset>
    <legend>Please enter user details!</legend>
    {{-- {{ print_r($errors) }} --}}
    @if($errors -> any())
    @foreach ($errors -> all() as $error)
    <div>
        <span class="error">{{ $error }}</span>
    </div>
    @endforeach
    @endif

    <form action="/adUser" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="name">Enter Name:</label></td>
                <td><input type="text" id="name" name="name" class="inputClass" value="{{ old('name') }}" 
                        class="{{ $errors->first('name')?'input-error': '' }}">
                    <span class="error">@error('name') {{ $message }}@enderror</span>
                </td>
                
            </tr>

            <tr>
                <td><label for="email">Enter Email:</label></td>
                <td>
                    <input type="email" id="email" name="email" class="inputClass" value="{{ old('email') }}">
                    <span class="error">@error('email') {{ $message }}@enderror</span>
                </td>
            </tr>

            <tr>
                <td><label for="age">Enter age:</label></td>
                <td>
                    <input type="number" id="age" name="age" class="inputClass" value="{{ old('age') }}">
                    <span class="error">@error('age') {{ $message }}@enderror</span>
                </td>
            </tr>

            <tr>
                <td><label for="password">Enter Password:</label></td>
                <td>
                    <input type="password" id="password" name="password" class="inputClass">
                    <span class="error">@error('password') {{ $message }}@enderror</span>
                </td>
            </tr>

            <tr>
                <td><label>Skills:</label></td>
                <td>
                    <input type="checkbox" id="php" name="skills[]" value="PHP" class="styled-checkbox"> <label
                        for="php" class="checkboxLable">Php</label>
                    <input type="checkbox" id="java" name="skills[]" value="Java" class="styled-checkbox"> <label
                        for="java" class="checkboxLable">Java</label>
                    <input type="checkbox" id="python" name="skills[]" value="Python" class="styled-checkbox"> <label
                        for="python" class="checkboxLable">Python</label>
                </td>
            </tr>

            <tr>
                <td><label>Gender:</label></td>
                <td>
                    <input type="radio" id="male" name="gender" value="Male"> <label
                        for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="Female"> <label
                        for="female">Female</label>
                </td>
            </tr>

            <tr>
                <td colspan="2" style="text-align: center;"><button>Submit</button></td>
            </tr>
        </table>
    </form>
</fieldset>



<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f5f5f5;
        margin: 0;
    }

    /* Style the fieldset */
    fieldset {
        border: 3px solid orange;
        /* Thicker border */
        border-radius: 10px;
        width: 350px;
        /* Width should fit content */
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        background: white;
    }

    /* Style the legend */
    legend {
        font-weight: bold;
        color: orange;
        font-size: 1.2rem;
        padding: 5px 10px;
        border: 2px solid orange;
        /* Border around the legend */
        border-radius: 5px;
        background: white;
    }

    /* Center the table */
    table {
        width: 100%;
        text-align: left;
    }

    /* Style inputs */
    .inputClass {
        color: orange;
        border: 2px solid orange;
        border-radius: 5px;
        height: 1.9rem;
        width: 100%;
        padding: 5px;
    }

    .input-error {
        color: orange;
        border: 2px solid red;
        border-radius: 5px;
        height: 1.9rem;
        width: 100%;
        padding: 5px;
    }

    .styled-checkbox {
        appearance: none;
        width: 16px;
        height: 16px;
        border: 1px solid orange;
        border-radius: 3px;
        position: relative;
        cursor: pointer;
        vertical-align: middle;
        margin-right: 5px;
    }

    .styled-checkbox:checked {
        background-color: orange;
    }

    .styled-checkbox:checked::after {
        content: '\2713';
        font-size: 14px;
        color: white;
        position: absolute;
        top: 0px;
        left: 2px;
    }

    .checkbox-label,
    .radio-label {
        display: inline-flex;
        align-items: center;
        margin-right: 10px;
    }

    .checkboxLable {
        margin-left: -3px;
        margin-right: 8px;
    }

    /* Style the button */
    button {
        width: 100px;
        color: white;
        background: orange;
        border: none;
        border-radius: 5px;
        padding: 10px;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background: darkorange;
    }

    .error {
        color: red;
        background: #ff000026;
    }
</style>
