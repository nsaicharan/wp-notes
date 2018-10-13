import $ from "jquery";

class Notes {
  constructor() {
    this.events();
  }

  events() {
    $("#new-note-form").submit(this.createNote.bind(this));
    $(".notes-list").on("click", ".js-delete-note", this.deleteNote);
  }

  /* === METHODS === */

  createNote(e) {
    e.preventDefault();
    console.log("Creating note..");

    const newPostData = {
      title: $("#new-note-title").val(),
      content: $("#new-note-body").val(),
      status: "publish"
    };

    $.ajax({
      beforeSend: xhr => {
        xhr.setRequestHeader("X-WP-Nonce", siteData.nonce);
      },
      url: siteData.rootURL + "/wp-json/wp/v2/note",
      type: "POST",
      data: newPostData,
      success: res => {
        console.log(res);

        // Add new note to list
        $(`<li class="note" data-note-id="${res.id}">
            <a href="${res.link}" class="note__title">
              ${res.title.raw}
            </a>

            <div class="note__options">
              <a href="#" class="js-delete-note btn btn--icon btn--danger mr-sm" title="Delete">X</a>
              <a href="#" class="js-edit-note btn btn--icon btn--secondary" title="Edit">E</a>
            </div>

            <p class="note__content">${res.content.raw}</p>
          </li>`)
          .prependTo(".notes-list")
          .hide()
          .slideDown();
      },
      error: err => {
        console.log(err);
      }
    });
  }

  deleteNote(e) {
    e.preventDefault();

    const note = $(this).closest(".note");
    const noteID = note.attr("data-note-id");

    $.ajax({
      beforeSend: xhr => {
        xhr.setRequestHeader("X-WP-NONCE", siteData.nonce);
      },
      type: "DELETE",
      url: siteData.rootURL + "/wp-json/wp/v2/note/" + noteID,
      success: res => {
        console.log("Deleted: ", res);
        note.slideUp();
      },
      error: err => {
        console.error(err);
      }
    });
  }
}

export default Notes;
