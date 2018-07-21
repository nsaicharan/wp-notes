class Notes {
  constructor() {
    this.events();
  }

  events() {
    $("#new-note-form").submit(this.createNote);
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
      },
      error: err => {
        console.log(err);
      }
    });
  }
}
