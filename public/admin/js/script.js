//FillterStatus
const buttonStatus = document.querySelectorAll("[button-status]");
if (buttonStatus.length > 0) {
    let url = new URL(window.location.href);
    buttonStatus.forEach(button => {
        button.addEventListener("click", () => {
            const status = button.getAttribute("button-status");
            if (status) {
                url.searchParams.set('status',status);
            }else {
                url.searchParams.delete('status');
            }
            window.location.href=url.href;
        })
    })
}

//End FillterStatus


// Search
const formSearch = document.querySelector("#form-search");
if (formSearch) {
    let url = new URL(window.location.href);
    formSearch.addEventListener('submit',(e) => {
        e.preventDefault();
        const keyword = e.target[0].value;
        if (keyword) {
            url.searchParams.set('keyword',keyword);
        }else {
            url.searchParams.delete('keyword');
        }
        window.location.href=url.href;
    })
}

//End Search

//Pagination

const ulpagi = document.querySelector("[ulpagination]");
if (ulpagi) {
    const buttonpagi = ulpagi.querySelectorAll("[buttonpagi]");
    let url = new URL(window.location.href);
    buttonpagi.forEach(button => {
        button.addEventListener("click",(e) => {
            const page = button.getAttribute('buttonpagi');
            url.searchParams.set('page',page);
            window.location.href=url.href;
        })
    })
}

//End Pagination

// ChangeStatus 
// const formchangeStatus = document.querySelector("#formchangeStatus");
// let path="";
// if (formchangeStatus) {
//     const path = formchangeStatus.getAttribute('data-path');
// }   
const buttonchangeStatus = document.querySelectorAll("[button-change-status]");
if (buttonchangeStatus.length > 0) {
    const formChangeStatus = document.querySelector('#formchangeStatus');
    if (formChangeStatus) {
        const path = formChangeStatus.getAttribute('data-path'); 
        buttonchangeStatus.forEach(button => {
            button.addEventListener("click", () => {
                const id = button.getAttribute('data-id');
                const status = button.getAttribute('data-status');
                const Statuschange = status == 'active' ? 'inactive' : 'active';
                const action = path + `${id}/${Statuschange}`;
                formChangeStatus.action = action;
                formChangeStatus.submit();
            })
        })
    }
    
}
//End ChangeStatus

// Delete

const btndelete = document.querySelectorAll("[button-delete]");
if (btndelete.length > 0) {
    const formDelete = document.querySelector('#formDelete'); 
    const path = formDelete.getAttribute("data-path");
    btndelete.forEach(button => {
        button.addEventListener("click",() => {
            const id = button.getAttribute("data-id");
            const action = path + `${id}`;
            formDelete.action=action;
            formDelete.submit();
        })
    })
}

//End Delete

// CheckBox Multi

const checkboxmulti = document.querySelector("[checkbox-multi]");
if (checkboxmulti) {
    const checkall = checkboxmulti.querySelector("input[name='checkall']");
    const inputcheckbox = document.querySelectorAll("input[name='id']");
    checkall.addEventListener("click", () => {
        if (checkall.checked) {
            inputcheckbox.forEach(input => {
                input.checked = true;
            })
        }else {
            inputcheckbox.forEach(input => {
                input.checked = false;
            })
        }
    })
    
    inputcheckbox.forEach(input => {
        input.addEventListener("click",() => {
            const inputchecked = checkboxmulti.querySelectorAll("input[name='id']:checked").length;
            if (inputchecked == inputcheckbox.length) {
                checkall.checked = true;
            }else {
                checkall.checked = false;
            }
        })
    })
}

// End CheckBox Multi

//Form ChangeMulti 

const formChangeMulti = document.querySelector("[form-changed-multi]");
if (formChangeMulti) {
    const inputform = formChangeMulti.querySelector("input[name='ids']");
    formChangeMulti.addEventListener("submit", (e) => {
        e.preventDefault();
        const inputchecked = checkboxmulti.querySelectorAll("input[name='id']:checked");
        const typeChange = formChangeMulti.querySelector("select[name='type']").value;
        console.log(typeChange);
        let arr = [];
        if (inputchecked.length > 0) {
            inputchecked.forEach(input => {
                const id = input.value;
                if (typeChange == "positions") {
                    const posittion = input.closest('tr').querySelector("input[name='positions']").value;
                    console.log(posittion);
                    arr.push(`${id}/${posittion}`);
                }else {
                    arr.push(id);
                }
            })
            inputform.value=arr.join(",");
            formChangeMulti.submit();
        }else {
            confirm('Vui Lòng Chọn Ít Nhất 1 Sản Phẩm');
        }
    })
}


//End Form ChangeMulti

// Show Alert

const showalert =document.querySelector("[show-alert]");
if (showalert) {
    const closeAlert =showalert.querySelector("[alert-close]");
    closeAlert.addEventListener("click", () => {
        showalert.classList.add('alert-hidden');
    })
    setTimeout(() => {
        showalert.classList.add('alert-hidden');
    },5000);
}

//End Show Alert

//PreView image Upload
const uploadsImage =  document.querySelector("[uploads-image]");
if (uploadsImage) {
    const uploadImageInput = uploadsImage.querySelector("[uploads-image-input]");
    const uploadImagePreview = uploadsImage.querySelector("[uploads-image-previews]");
    const buttondelete = uploadsImage.querySelector("[button-delete-uploads]");
    if ((uploadImageInput.value == "") && (uploadImagePreview.getAttribute("src") == "")) {
        buttondelete.classList.add("button-hidden");    
    }  
    uploadImageInput.addEventListener("change", (e) => {
        const [file] = e.target.files;
        if (file) {
            uploadImagePreview.src= URL.createObjectURL(file);
            buttondelete.classList.remove("button-hidden");
        }
    })
    buttondelete.addEventListener("click", () => {
        uploadImageInput.value = "";
        uploadImagePreview.src = ""; 
        buttondelete.classList.add("button-hidden");
    })
}



//End PreView Image Upload