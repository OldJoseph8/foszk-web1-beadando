function checkUsername(username){
    
    // Igazat ad vissza, ha a felhasználónév csak számokból, betűkből vagy _-ból áll, és maximum 255 karakter hosszú egyébként hamisat.
    
    let validChars = new RegExp("^\\w{1,255}$");
    return validChars.test(username);
}

function checkName(name){

    // Igazat ad vissza, ha a név csak a magyar ABC betűiből áll és max 32 karakter hosszú, egyébként hamisat.

    let validChars = new RegExp("^[A-z\u00c1-\u0171]{1,32}$");
    return validChars.test(name);
}

function checkPassword(password){

    // Igazat ad vissza, ha a jelszó csak ! és ~ közötti ASCII karakterekből áll és minimum 8 karakter hosszú, egyébként hamisat.

    let validChars = new RegExp("^[!-~]{8,}$");
    return validChars.test(password);
}

function checkEmail(email){

    // Igazat ad vissza, ha az e-mail cím megfelel a megadott mintának, egyébként hamisat (minta forrása: https://emailregex.com/index.html)

    let emailPattern = new RegExp("^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$");
    return emailPattern.test(email);
}

function passwordsMatch(password, passwordRepeat){

    // Igazat ad vissza, ha a jelszó pontosan megegyezik a jelszó megerősítésével, egyébként hamisat

    return password === passwordRepeat;
}

function submitRegistration(form_id, username_id, family_id, given_id, email_id, password_id, password_repeat_id){

    // Ellenőrzi, hogy az úrlap felhasználónév, név, e-mail cím és jelszó mezői megfelelnek-e a követelményeknek.
    // Ha igen, akkor elküldi a lapot az adatokkal.

    let username = document.getElementById(username_id).value;

    let family = document.getElementById(family_id).value;
    let given = document.getElementById(given_id).value;

    let email = document.getElementById(email_id).value;

    let password = document.getElementById(password_id).value;
    let password_repeat = document.getElementById(password_repeat_id).value;

    let allValid = checkUsername(username) && checkEmail(email) && checkPassword(password) && passwordsMatch(password, password_repeat) && checkName(family) && checkName(given);
    if (allValid) {
        let form = document.getElementById(form_id);
        form.submit()
    }
    return;
}

function checkMessage(message){

    // Lenyírja a kapott karakterláncról a white spaceket, ellenőrizi, hogy
    // - a megnyírt karakterláncban van-e még karakter,
    // - rövidebb-e, mint a megengedett hossz.
    // Ha igen, akkor igazat ad vissza, egyébként hamisat.

    message = message.trim();
    let messageLength = message.length;
    let maxLength = 1024;
    let lsEqMax = messageLength <= maxLength;
    let validMessage = messageLength && lsEqMax;
    return validMessage;
}

function submitMessage(form_id, message_id){

    // Ellenőrzi, hogy a forma üzenet mezője megfelel-e a követelményeknek.
    // Ha igen, akkor elküldi a formát az adatokkal.

    let message = document.getElementById(message_id).value;
    if (checkMessage(message)) {
        let form = document.getElementById(form_id);
        form.submit()
    }
    return;
}