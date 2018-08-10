import $ from "jquery";

class Notes {
  constructor() {
    this.events();
  }

  events() {
    $("#new-note-form").submit(this.createNote.bind(this));
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
        $(`<li class="notes-list__item">
            <a href="${res.link}" class="notes-list__title">
              ${res.title.raw}
            </a>
            <p class="notes-list__content">${res.content.raw}</p>
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
}

export default Notes;
