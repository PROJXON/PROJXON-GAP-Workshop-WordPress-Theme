import $ from 'jquery';

export default class LiveSearch {
  constructor() {
    this.searchWrapper = $('#searchWrapper');
    this.searchResults = $('#liveSearch');
    this.searchField = $('#s');
    this.prevSearchQuery = '';
    this.timer;
    this.spinnerVisible = false;

    this.searchField.on('input', this.inputChanged.bind(this));
    this.searchField.on('focus', this.searchFieldFocused.bind(this));
    $(document).on('click', this.documentClick.bind(this));
  }

  inputChanged() {
    if (this.searchField.val() !== this.prevSearchQuery) {
      this.prevSearchQuery = this.searchField.val();
      if (this.prevSearchQuery === '') this.searchResultsInvisible();
      else {
        clearTimeout(this.timer);
        if (!this.spinnerVisible) {
          this.searchResults.html('<div class="loading-icon"></div>');
          this.spinnerVisible = true;
        }
        this.searchResultsVisible();
        this.timer = setTimeout(this.displaySearchResults.bind(this), 800);
      }
    }
  }

  displaySearchResults() {
    $.getJSON(
      `${siteData.domain}/wp-json/custom/v1/combined?search=${this.searchField.val()}`,
      (data) => {
        if (data.length) {
          this.searchResults.html(`
          ${data
            .map(
              (item) => `<li>
              <a href="${item.link}">
                ${item.title}${item.type === 'post' ? ` by <span>${item.author}</span>` : ''}
              </a>
            </li>
            `,
            )
            .join('')}
        `);
        } else this.searchResults.html(`<li id="noResults">No results found.</li>`);
      },
    );

    this.spinnerVisible = false;
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
