const $openBooksDialog = document.getElementById("open-books-crud");
const $openUsersDialog = document.getElementById("open-users-crud");
const $openGenreDialog = document.getElementById("open-genre-dialog");
const $openAuthorDialog = document.getElementById("open-author-dialog");
const $openUserActionDialog = document.getElementById(
  "open-user-action-dialog"
);
const $openSearchBookDialog = document.getElementById(
  "open-search-book-dialog"
);
const $openDeleteBookDialog = document.getElementById(
  "open-delete-book-dialog"
);

const $closeBooksDialog = document.getElementById("close-books-dialog");
const $closeUsersDialog = document.getElementById("close-users-dialog");
const $closeGenreDialog = document.getElementById("close-genre-dialog");
const $closeAuthorDialog = document.getElementById("close-author-dialog");
const $closeUserAction = document.getElementById("close-user-action-dialog");
const $closeSearchBookDialog = document.getElementById(
  "close-search-book-dialog"
);
const $closeDeleteBookDialog = document.getElementById(
  "close-delete-book-dialog"
);

const $booksDialog = document.getElementById("books-dialog");
const $usersDialog = document.getElementById("users-dialog");
const $genreDialog = document.getElementById("genre-dialog");
const $authorDialog = document.getElementById("author-dialog");
const $userActionDialog = document.getElementById("user-action-dialog");
const $searchBookDialog = document.getElementById("search-book-dialog");
const $deleteBookDialog = document.getElementById("delete-book-dialog");

const $profileAuthorInput = document.getElementById("profile-img");
const $authorInput = document.getElementById("new-author");
const $userActionInput = document.getElementById("user-action-input");

const $bookFormStatus = document.getElementById("book-status"); // Currently unused

/* Dynamic dialogs behavior */

/* *** Manage books */

$authorInput.addEventListener("input", (e) => {
  const authorName = e.target.value.toLowerCase().replace(/\s/g, "");

  $profileAuthorInput.value =
    authorName === ""
      ? ""
      : `https://api.dicebear.com/6.x/lorelei/svg?seed=${authorName}`;
});

/* *** User action */

const $editUserBtns = document.querySelectorAll(".action-btn--edit");

const $userActionForm = document.getElementById("user-action-form");
const $userActionTitle = document.getElementById("user-action-title");
const $userActionUserId = document.getElementById("user-action-title-id");
const $userActionText = document.getElementById("user-action-text");
const $editUserIdInput = document.getElementById("edit-user-id");

$editUserBtns.forEach(($editUserBtn) => {
  $editUserBtn.addEventListener("click", (e) => {
    const $selectedUserRow = e.target.closest("tr");
    const userData = [
      ...$selectedUserRow.querySelectorAll("td:not(:nth-child(5))"),
    ].map((td) => td.textContent.trim());

    openUserActionDialogWithParams({
      id: userData[0],
      username: userData[1],
      email: userData[2],
      role: userData[3],
      passwd: userData[4],
    });

    $editUserIdInput.value = userData[0];
  });
});

$openUserActionDialog.addEventListener("click", () => {
  $userActionForm.reset();
  $userActionTitle.textContent = "Creando usuario...";
  $userActionText.textContent = "Estás creando un nuevo usuario.";
  $userActionUserId.textContent = "";
});

/* Dialogs */

setupDialogs();

function openUserActionDialogWithParams({ id, username, email, role, passwd }) {
  const SELECT_OPTIONS = ["admin", "usuario"];
  const $usernameInput = document.getElementById("username");
  const $emailInput = document.getElementById("user-email");
  const $passwdInput = document.getElementById("user-passwd");
  const $roleSelect = document.getElementById("user-role");

  $usernameInput.value = username;
  $emailInput.value = email;
  $passwdInput.value = passwd;
  $roleSelect.selectedIndex = SELECT_OPTIONS.indexOf(role.toLowerCase());

  $userActionTitle.textContent = "Modificando usuario";
  $userActionText.textContent = "Estás modificando un usuario existente.";
  $userActionUserId.textContent = `- ID ${id}`;

  $userActionDialog.showModal();
}

function setupDialogs() {
  $openBooksDialog.addEventListener("click", () => {
    $booksDialog.showModal();
  });

  $openUsersDialog.addEventListener("click", () => {
    $usersDialog.showModal();
  });

  $openGenreDialog.addEventListener("click", () => {
    $genreDialog.showModal();
  });

  $openAuthorDialog.addEventListener("click", () => {
    $authorDialog.showModal();
  });

  $openUserActionDialog.addEventListener("click", () => {
    $userActionDialog.showModal();
  });

  $openSearchBookDialog.addEventListener("click", () => {
    $searchBookDialog.showModal();
  });

  $openDeleteBookDialog.addEventListener("click", () => {
    $deleteBookDialog.showModal();
  });

  /* Close dialogs */

  $closeBooksDialog.addEventListener("click", () => {
    $booksDialog.close();
  });

  $closeUsersDialog.addEventListener("click", () => {
    $usersDialog.close();
  });

  $closeGenreDialog.addEventListener("click", () => {
    $genreDialog.close();
  });

  $closeAuthorDialog.addEventListener("click", () => {
    $authorDialog.close();
  });

  $closeUserAction.addEventListener("click", () => {
    $userActionDialog.close();
  });

  $closeSearchBookDialog.addEventListener("click", () => {
    $searchBookDialog.close();
  });

  $closeDeleteBookDialog.addEventListener("click", () => {
    $deleteBookDialog.close();
  });
}
