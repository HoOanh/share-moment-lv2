<section class="recentOrder">
    <div class="cardHeader">
        <h2>Add new User</h2>
    </div>
    <form action="../account/" method="POST" id="form-login">
        <div class="user-details">
            <div class="input-box" readonly>
                <span class="details">ID User</span>
                <input type="text" readonly value="Spontaneous System ID" />
            </div>
            <div class="input-box">
                <span class="details">Full Name</span>
                <input type="text" name="fullName" />
            </div>
            <div class="input-box">
                <span class="details">Username</span>
                <input type="text" name="username" />
            </div>
            <div class="input-box">
                <span class="details">Password</span>
                <input type="password" name="pass" />
            </div>
            <div class="input-box">
                <span class="details">Email</span>
                <input type="email" name="email" />
            </div>
            <div class="input-box">
                <span class="details">Phone Number</span>
                <input type="text" name="phone" />
            </div>

            <div class="gender-details input-box">
                <input type="radio" name="role" id="dot-1" value="0" />
                <input type="radio" name="role" id="dot-2" value="1" checked />
                <div class="category">
                    <span class="gender-title">Role:</span>
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Client</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Admin</span>
                    </label>
                </div>
            </div>

            <div class="gender-details input-box">
                <input type="radio" name="gender" id="dot-1" value="0" />
                <input type="radio" name="gender" id="dot-2" value="1" checked />
                <div class="category">
                    <span class="gender-title">Gender:</span>
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Female</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Male</span>
                    </label>
                </div>
            </div>

        </div>
        <div class="button">
            <button name="btn_insert" class="btn sm-btn">Apply</button>
            <button type="reset" class="btn sm-btn">Reset</button>
            <a href="../users/" class="btn sm-btn">List Type</a>
        </div>

    </form>
</section>