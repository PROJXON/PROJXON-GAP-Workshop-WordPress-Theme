import $ from 'jquery';

export default class LiveSearch {
  constructor() {
    this.searchWrapper = $('#searchWrapper');
    this.searchResults = $('#liveSearch');
    this.searchField = $('#s');
    this.prevSearchQuery = '';

    this.searchField.on('input', this.inputChanged.bind(this));
    this.searchField.on('focus', this.searchFieldFocused.bind(this));
    $(document).on('click', this.documentClick.bind(this));
  }

  inputChanged() {
    if (this.searchField.val() !== this.prevSearchQuery) {
      this.prevSearchQuery = this.searchField.val();
      if (this.prevSearchQuery === '') this.searchResultsInvisible();
      else this.searchResultsVisible();
    }
  }

  searchFieldFocused() {
    if (this.prevSearchQuery !== '') this.searchResultsVisible();
  }

  documentClick(e) {
    if (!$(e.target).closest(this.searchWrapper).length) {
      this.searchResultsInvisible();
    }
  }

  searchResultsVisible() {
    this.searchResults.removeClass('invisible');
  }

  searchResultsInvisible() {
    this.searchResults.addClass('invisible');
  }
}
