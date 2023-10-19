const forms = document.querySelector(".forms"),
    pwShowHide = document.querySelectorAll(".eye-icon"),
    links = document.querySelectorAll(".link");

pwShowHide.forEach(eyeIcon => {
    eyeIcon.addEventListener("click", () => {
        let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".password");

        pwFields.forEach(password => {
            if (password.type === "password") {
                password.type = "text";
                eyeIcon.classList.replace("bx-hide", "bx-show");
                return;
            }
            password.type = "password";
            eyeIcon.classList.replace("bx-show", "bx-hide");
        })

    })
})

links.forEach(link => {
    link.addEventListener("click", e => {
        e.preventDefault(); //preventing form submit
        forms.classList.toggle("show-signup");
    })
})

function handleSigNupClick() {
    let pwd = document.getElementById("password");
    let cofpwd = document.getElementById("cofPassword");
    let email = document.getElementById("email");
    if (!email.value) {
        alert("邮箱不能为空！");
        return
    }
    if (!isEmail(email.value)) {
        alert("邮箱格式错误！");
        return
    }
    let b = false;

    if (!pwd.value || !cofpwd.value) {
        alert("密码不能为空！");
    } else {
        if (pwd.value != cofpwd.value) {
            alert("两次密码不一致！");
        } else {
            location.href = "Home.html"
        }
    }
}

/**
 * 邮箱格式正则校验
 * @param email
 * @returns {boolean}
 */
function isEmail(email) {
    let emailRegExp = /^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/
    return emailRegExp.test(email)
}