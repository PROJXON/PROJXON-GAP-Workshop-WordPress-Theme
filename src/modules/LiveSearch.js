import $ from 'jquery';

export default class LiveSearch {
  constructor() {
    this.searchResults = $('#liveSearch');
    this.searchField = $('#s');
    this.prevSearchQuery = '';

    this.searchField.on('keyup', this.keyPressed.bind(this));
    this.searchField.focus(this.searchFieldFocused.bind(this));
    this.searchField.blur(this.searchResultsInvisible.bind(this));
  }

  keyPressed() {
    if (this.searchField.val() !== this.prevSearchQuery) {
      this.prevSearchQuery = this.searchField.val();
      if (this.prevSearchQuery === '') this.searchResultsInvisible();
      else this.searchResultsVisible();
    }
  }

  searchFieldFocused() {
    console.log(this.prevSearchQuery);
    if (this.prevSearchQuery !== '') this.searchResultsVisible();
  }

  searchResultsVisible() {
    this.searchResults.removeClass('invisible');
  }

  searchResultsInvisible() {
    this.searchResults.addClass('invisible');
  }
}
