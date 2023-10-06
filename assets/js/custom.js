function toggleNavbar(collapseID) {
  document.getElementById(collapseID).classList.toggle('hidden')
  document.getElementById(collapseID).classList.toggle('block')
}

function updateFileName(input) {
  const fileName = input.files[0].name
  document.getElementById('file-name').value = fileName
}

function extractEmails() {
  const checkboxes = document.querySelectorAll('input[type="checkbox"]')
  const checkedEmails = []

  checkboxes.forEach((checkbox, index) => {
    if (checkbox.checked) {
      // Find the corresponding email cell in the same row
      const email_id = '#email' + checkbox.id
      const emailCell = document.querySelector(email_id)
      const email = emailCell.textContent.trim()

      checkedEmails.push(email)
    }
  })

  const emailList = document.getElementById('email-list')
  emailList.value = checkedEmails.join(', ')

  const writeBtns = document.getElementById('writeBtns')
  if (checkedEmails.length > 0) {
    writeBtns.classList.remove('hidden')
    writeBtns.classList.add('flex')
  } else {
    writeBtns.classList.remove('flex')
    writeBtns.classList.add('hidden')
  }
}

// Attach a change event listener to all checkboxes
const checkboxes = document.querySelectorAll('input[type="checkbox"]')
checkboxes.forEach((checkbox) => {
  checkbox.addEventListener('change', extractEmails)
})

function toggleScale(elementId, scale0, scale100) {
  const element = document.getElementById(elementId)
  element.classList.remove(scale0)
  element.classList.add(scale100)
}

const messageBtn = document.getElementById('write-message')
messageBtn.addEventListener('click', () =>
  toggleScale('message-modal', 'scale-0', 'scale-100')
)

const clearSelectionBtn = document.getElementById('clear-selections')
clearSelectionBtn.addEventListener('click', () => {
  const checkboxes = document.querySelectorAll('input[type="checkbox"]')
  checkboxes.forEach((checkbox, index) => (checkbox.checked = false))

  const emailList = document.getElementById('email-list')
  emailList.value = ''

  const writeBtns = document.getElementById('writeBtns')
  writeBtns.classList.remove('flex')
  writeBtns.classList.add('hidden')
})

const selectAllBtn = document.getElementById('selection-all')
selectAllBtn.addEventListener('click', () => {
  const checkboxes = document.querySelectorAll('input[type="checkbox"]')
  const checkedEmails = []

  checkboxes.forEach((checkbox, index) => {
    checkbox.checked = true
    const email_id = '#email' + checkbox.id
    const emailCell = document.querySelector(email_id)
    const email = emailCell.textContent.trim()

    checkedEmails.push(email)
  })

  const emailList = document.getElementById('email-list')
  emailList.value = checkedEmails.join(', ')
})

const closeBtn = document.getElementById('closeBtn')
closeBtn.addEventListener('click', () =>
  toggleScale('message-modal', 'scale-100', 'scale-0')
)

// This filters the users table
document.addEventListener('DOMContentLoaded', (event) => {
  let searchInput = document.querySelector('input[name="user"]')

  searchInput.addEventListener('keyup', function (event) {
    let searchTerm = event.target.value.toLowerCase()
    let userTable = document.querySelector('#user-table')
    let rows = userTable.querySelectorAll('tr')

    for (let i = 0, row; (row = rows[i]); i++) {
      let email = row
        .querySelector('td[id^="email__"]')
        .textContent.toLowerCase()
      let name = row
        .querySelector('td:nth-child(2) span')
        .textContent.toLowerCase()

      if (email.includes(searchTerm) || name.includes(searchTerm)) {
        row.style.display = ''
      } else {
        row.style.display = 'none'
      }
    }
  })
})

console.log('Hello World');