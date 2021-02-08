(function() {
  var initPhotoSwipeFromDOM;

  initPhotoSwipeFromDOM = function(gallerySelector) {
    var closest, galleryElements, hashData, i, l, onThumbnailsClick, openPhotoSwipe, parseThumbnailElements, photoswipeParseHash;
    // parse slide data (url, title, size ...) from DOM elements 
    // (children of gallerySelector)
    parseThumbnailElements = function(el) {
      var figureEl, i, item, items, linkEl, numNodes, size, thumbElements;
      thumbElements = el.childNodes;
      numNodes = thumbElements.length;
      items = [];
      figureEl = void 0;
      linkEl = void 0;
      size = void 0;
      item = void 0;
      i = 0;
      while (i < numNodes) {
        figureEl = thumbElements[i];
        // <figure> element
        // include only element nodes 
        if (figureEl.nodeType !== 1) {
          i++;
          continue;
        }
        linkEl = figureEl.children[0];
        // <a> element
        size = linkEl.getAttribute('data-size').split('x');
        // create slide object
        item = {
          src: linkEl.getAttribute('href'),
          w: parseInt(size[0], 10),
          h: parseInt(size[1], 10)
        };
        if (figureEl.children.length > 1) {
          // <figcaption> content
          item.title = figureEl.children[1].innerHTML;
        }
        if (linkEl.children.length > 0) {
          // <img> thumbnail element, retrieving thumbnail url
          item.msrc = linkEl.children[0].getAttribute('src');
        }
        item.el = figureEl;
        // save link to element for getThumbBoundsFn
        items.push(item);
        i++;
      }
      return items;
    };
    // find nearest parent element
    closest = function(el, fn) {
      return el && (fn(el) ? el : closest(el.parentNode, fn));
    };
    // triggers when user clicks on thumbnail
    onThumbnailsClick = function(e) {
      var childNodes, clickedGallery, clickedListItem, eTarget, i, index, nodeIndex, numChildNodes;
      e = e || window.event;
      if (e.preventDefault) {
        e.preventDefault();
      } else {
        (e.returnValue = false);
      }
      eTarget = e.target || e.srcElement;
      // find root element of slide
      clickedListItem = closest(eTarget, function(el) {
        return el.tagName && el.tagName.toUpperCase() === 'FIGURE';
      });
      if (!clickedListItem) {
        return;
      }
      // find index of clicked item by looping through all child nodes
      // alternatively, you may define index via data- attribute
      clickedGallery = clickedListItem.parentNode;
      childNodes = clickedListItem.parentNode.childNodes;
      numChildNodes = childNodes.length;
      nodeIndex = 0;
      index = void 0;
      i = 0;
      while (i < numChildNodes) {
        if (childNodes[i].nodeType !== 1) {
          i++;
          continue;
        }
        if (childNodes[i] === clickedListItem) {
          index = nodeIndex;
          break;
        }
        nodeIndex++;
        i++;
      }
      if (index >= 0) {
        // open PhotoSwipe if valid index found
        openPhotoSwipe(index, clickedGallery);
      }
      return false;
    };
    // parse picture index and gallery index from URL (#&pid=1&gid=2)
    photoswipeParseHash = function() {
      var hash, i, pair, params, vars;
      hash = window.location.hash.substring(1);
      params = {};
      if (hash.length < 5) {
        return params;
      }
      vars = hash.split('&');
      i = 0;
      while (i < vars.length) {
        if (!vars[i]) {
          i++;
          continue;
        }
        pair = vars[i].split('=');
        if (pair.length < 2) {
          i++;
          continue;
        }
        params[pair[0]] = pair[1];
        i++;
      }
      if (params.gid) {
        params.gid = parseInt(params.gid, 10);
      }
      return params;
    };
    openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
      var gallery, items, j, options, pswpElement;
      pswpElement = document.querySelectorAll('.pswp')[0];
      gallery = void 0;
      options = void 0;
      items = void 0;
      items = parseThumbnailElements(galleryElement);
      // define options (if needed)
      options = {
        galleryUID: galleryElement.getAttribute('data-pswp-uid'),
        getThumbBoundsFn: function(index) {
          var pageYScroll, rect, thumbnail;
          // See Options -> getThumbBoundsFn section of documentation for more info
          thumbnail = items[index].el.getElementsByTagName('img')[0];
          pageYScroll = window.pageYOffset || document.documentElement.scrollTop;
          rect = thumbnail.getBoundingClientRect();
          return {
            x: rect.left,
            y: rect.top + pageYScroll,
            w: rect.width
          };
        }
      };
      // PhotoSwipe opened from URL
      if (fromURL) {
        if (options.galleryPIDs) {
          // parse real index when custom PIDs are used 
          // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
          j = 0;
          while (j < items.length) {
            if (items[j].pid === index) {
              options.index = j;
              break;
            }
            j++;
          }
        } else {
          // in URL indexes start from 1
          options.index = parseInt(index, 10) - 1;
        }
      } else {
        options.index = parseInt(index, 10);
      }
      // exit if index not found
      if (isNaN(options.index)) {
        return;
      }
      if (disableAnimation) {
        options.showAnimationDuration = 0;
      }
      // Pass data to PhotoSwipe and initialize it
      gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
      gallery.init();
    };
    // loop through all gallery elements and bind events
    galleryElements = document.querySelectorAll(gallerySelector);
    i = 0;
    l = galleryElements.length;
    while (i < l) {
      galleryElements[i].setAttribute('data-pswp-uid', i + 1);
      galleryElements[i].onclick = onThumbnailsClick;
      i++;
    }
    // Parse URL and open gallery if it contains #&pid=3&gid=1
    hashData = photoswipeParseHash();
    if (hashData.pid && hashData.gid) {
      openPhotoSwipe(hashData.pid, galleryElements[hashData.gid - 1], true, true);
    }
  };

  // execute above function
  initPhotoSwipeFromDOM('.gallery');

  // ---
// generated by js2coffee 2.2.0

}).call(this);

//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsiPGFub255bW91cz4iXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUFBQSxNQUFBOztFQUFBLHFCQUFBLEdBQXdCLFFBQUEsQ0FBQyxlQUFELENBQUE7QUFJdEIsUUFBQSxPQUFBLEVBQUEsZUFBQSxFQUFBLFFBQUEsRUFBQSxDQUFBLEVBQUEsQ0FBQSxFQUFBLGlCQUFBLEVBQUEsY0FBQSxFQUFBLHNCQUFBLEVBQUEsbUJBQUE7OztJQUFBLHNCQUFBLEdBQXlCLFFBQUEsQ0FBQyxFQUFELENBQUE7QUFDdkIsVUFBQSxRQUFBLEVBQUEsQ0FBQSxFQUFBLElBQUEsRUFBQSxLQUFBLEVBQUEsTUFBQSxFQUFBLFFBQUEsRUFBQSxJQUFBLEVBQUE7TUFBQSxhQUFBLEdBQWdCLEVBQUUsQ0FBQztNQUNuQixRQUFBLEdBQVcsYUFBYSxDQUFDO01BQ3pCLEtBQUEsR0FBUTtNQUNSLFFBQUEsR0FBVztNQUNYLE1BQUEsR0FBUztNQUNULElBQUEsR0FBTztNQUNQLElBQUEsR0FBTztNQUNQLENBQUEsR0FBSTtBQUNKLGFBQU0sQ0FBQSxHQUFJLFFBQVY7UUFDRSxRQUFBLEdBQVcsYUFBYyxDQUFBLENBQUEsRUFBekI7OztRQUdBLElBQUcsUUFBUSxDQUFDLFFBQVQsS0FBcUIsQ0FBeEI7VUFDRSxDQUFBO0FBQ0EsbUJBRkY7O1FBR0EsTUFBQSxHQUFTLFFBQVEsQ0FBQyxRQUFTLENBQUEsQ0FBQSxFQU4zQjs7UUFRQSxJQUFBLEdBQU8sTUFBTSxDQUFDLFlBQVAsQ0FBb0IsV0FBcEIsQ0FBZ0MsQ0FBQyxLQUFqQyxDQUF1QyxHQUF2QyxFQVJQOztRQVVBLElBQUEsR0FDRTtVQUFBLEdBQUEsRUFBSyxNQUFNLENBQUMsWUFBUCxDQUFvQixNQUFwQixDQUFMO1VBQ0EsQ0FBQSxFQUFHLFFBQUEsQ0FBUyxJQUFLLENBQUEsQ0FBQSxDQUFkLEVBQWtCLEVBQWxCLENBREg7VUFFQSxDQUFBLEVBQUcsUUFBQSxDQUFTLElB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Q0FBQSxDQUFFLENBQUMsT0FBbkIsR0FBNkI7TUFDN0IsQ0FBQTtJQUhGLENBbkpBOztJQXdKQSxRQUFBLEdBQVcsbUJBQUEsQ0FBQTtJQUNYLElBQUcsUUFBUSxDQUFDLEdBQVQsSUFBaUIsUUFBUSxDQUFDLEdBQTdCO01BQ0UsY0FBQSxDQUFlLFFBQVEsQ0FBQyxHQUF4QixFQUE2QixlQUFnQixDQUFBLFFBQVEsQ0FBQyxHQUFULEdBQWUsQ0FBZixDQUE3QyxFQUFnRSxJQUFoRSxFQUFzRSxJQUF0RSxFQURGOztFQTdKc0IsRUFBeEI7OztFQWtLQSxxQkFBQSxDQUFzQixVQUF0Qjs7RUFsS0E7O0FBQUEiLCJzb3VyY2VzQ29udGVudCI6WyJpbml0UGhvdG9Td2lwZUZyb21ET00gPSAoZ2FsbGVyeVNlbGVjdG9yKSAtPlxuICAjIHBhcnNlIHNsaWRlIGRhdGEgKHVybCwgdGl0bGUsIHNpemUgLi4uKSBmcm9tIERPTSBlbGVtZW50cyBcbiAgIyAoY2hpbGRyZW4gb2YgZ2FsbGVyeVNlbGVjdG9yKVxuXG4gIHBhcnNlVGh1bWJuYWlsRWxlbWVudHMgPSAoZWwpIC0+XG4gICAgdGh1bWJFbGVtZW50cyA9IGVsLmNoaWxkTm9kZXNcbiAgICBudW1Ob2RlcyA9IHRodW1iRWxlbWVudHMubGVuZ3RoXG4gICAgaXRlbXMgPSBbXVxuICAgIGZpZ3VyZUVsID0gdW5kZWZpbmVkXG4gICAgbGlua0VsID0gdW5kZWZpbmVkXG4gICAgc2l6ZSA9IHVuZGVmaW5lZFxuICAgIGl0ZW0gPSB1bmRlZmluZWRcbiAgICBpID0gMFxuICAgIHdoaWxlIGkgPCBudW1Ob2Rlc1xuICAgICAgZmlndXJlRWwgPSB0aHVtYkVsZW1lbnRzW2ldXG4gICAgICAjIDxmaWd1cmU+IGVsZW1lbnRcbiAgICAgICMgaW5jbHVkZSBvbmx5IGVsZW1lbnQgbm9kZXMgXG4gICAgICBpZiBmaWd1cmVFbC5ub2RlVHlwZSAhPSAxXG4gICAgICAgIGkrK1xuICAgICAgICBjb250aW51ZVxuICAgICAgbGlua0VsID0gZmlndXJlRWwuY2hpbGRyZW5bMF1cbiAgICAgICMgPGE+IGVsZW1lbnRcbiAgICAgIHNpemUgPSBsaW5rRWwuZ2V0QXR0cmlidXRlKCdkYXRhLXNpemUnKS5zcGxpdCgneCcpXG4gICAgICAjIGNyZWF0ZSBzbGlkZSBvYmplY3RcbiAgICAgIGl0ZW0gPVxuICAgICAgICBzcmM6IGxpbmtFbC5nZXRBdHRyaWJ1dGUoJ2hyZWYnKVxuICAgICAgICB3OiBwYXJzZUludChzaXplWzBdLCAxMClcbiAgICAgICAgaDogcGFyc2VJbnQoc2l6ZVsxXSwgMTApXG4gICAgICBpZiBmaWd1cmVFbC5jaGlsZHJlbi5sZW5ndGggPiAxXG4gICAgICAgICMgPGZpZ2NhcHRpb24+IGNvbnRlbnRcbiAgICAgICAgaXRlbS50aXRsZSA9IGZpZ3VyZUVsLmNoaWxkcmVuWzFdLmlubmVySFRNTFxuICAgICAgaWYgbGlua0VsLmNoaWxkcmVuLmxlbmd0aCA+IDBcbiAgICAgICAgIyA8aW1nPiB0aHVtYm5haWwgZWxlbWVudCwgcmV0cmlldmluZyB0aHVtYm5haWwgdXJsXG4gICAgICAgIGl0ZW0ubXNyYyA9IGxpbmtFbC5jaGlsZHJlblswXS5nZXRBdHRyaWJ1dGUoJ3NyYycpXG4gICAgICBpdGVtLmVsID0gZmlndXJlRWxcbiAgICAgICMgc2F2ZSBsaW5rIHRvIGVsZW1lbnQgZm9yIGdldFRodW1iQm91bmRzRm5cbiAgICAgIGl0ZW1zLnB1c2ggaXRlbVxuICAgICAgaSsrXG4gICAgaXRlbXNcblxuICAjIGZpbmQgbmVhcmVzdCBwYXJlbnQgZWxlbWVudFxuXG4gIGNsb3Nlc3QgPSAoZWwsIGZuKSAtPlxuICAgIGVsIGFuZCAoaWYgZm4oZWwpIHRoZW4gZWwgZWxzZSBjbG9zZXN0KGVsLnBhcmVudE5vZGUsIGZuKSlcblxuICAjIHRyaWdnZXJzIHdoZW4gdXNlciBjbGlja3Mgb24gdGh1bWJuYWlsXG5cbiAgb25UaHVtYm5haWxzQ2xpY2sgPSAoZSkgLT5cbiAgICBlID0gZSBvciB3aW5kb3cuZXZlbnRcbiAgICBpZiBlLnByZXZlbnREZWZhdWx0IHRoZW4gZS5wcmV2ZW50RGVmYXVsdCgpIGVsc2UgKGUucmV0dXJuVmFsdWUgPSBmYWxzZSlcbiAgICBlVGFyZ2V0ID0gZS50YXJnZXQgb3IgZS5zcmNFbGVtZW50XG4gICAgIyBmaW5kIHJvb3QgZWxlbWVudCBvZiBzbGlkZVxuICAgIGNsaWNrZWRMaXN0SXRlbSA9IGNsb3Nlc3QoZVRhcmdldCwgKGVsKSAtPlxuICAgICAgZWwudGFnTmFtZSBhbmQgZWwudGFnTmFtZS50b1VwcGVyQ2FzZSgpID09ICdGSUdVUkUnXG4gICAgKVxuICAgIGlmICFjbGlja2VkTGlzdEl0ZW1cbiAgICAgIHJldHVyblxuICAgICMgZmluZCBpbmRleCBvZiBjbGlja2VkIGl0ZW0gYnkgbG9vcGluZyB0aHJvdWdoIGFsbCBjaGlsZCBub2Rlc1xuICAgICMgYWx0ZXJuYXRpdmVseSwgeW91IG1heSBkZWZpbmUgaW5kZXggdmlhIGRhdGEtIGF0dHJpYnV0ZVxuICAgIGNsaWNrZWRHYWxsZXJ5ID0gY2xpY2tlZExpc3RJdGVtLnBhcmVudE5vZGVcbiAgICBjaGlsZE5vZGVzID0gY2xpY2tlZExpc3RJdGVtLnBhcmVudE5vZGUuY2hpbGROb2Rlc1xuICAgIG51bUNoaWxkTm9kZXMgPSBjaGlsZE5vZGVzLmxlbmd0aFxuICAgIG5vZGVJbmRleCA9IDBcbiAgICBpbmRleCA9IHVuZGVmaW5lZFxuICAgIGkgPSAwXG4gICAgd2hpbGUgaSA8IG51bUNoaWxkTm9kZXNcbiAgICAgIGlmIGNoaWxkTm9kZXNbaV0ubm9kZVR5cGUgIT0gMVxuICAgICAgICBpKytcbiAgICAgICAgY29udGludWVcbiAgICAgIGlmIGNoaWxkTm9kZXNbaV0gPT0gY2xpY2tlZExpc3RJdGVtXG4gICAgICAgIGluZGV4ID0gbm9kZUluZGV4XG4gICAgICAgIGJyZWFrXG4gICAgICBub2RlSW5kZXgrK1xuICAgICAgaSsrXG4gICAgaWYgaW5kZXggPj0gMFxuICAgICAgIyBvcGVuIFBob3RvU3dpcGUgaWYgdmFsaWQgaW5kZXggZm91bmRcbiAgICAgIG9wZW5QaG90b1N3aXBlIGluZGV4LCBjbGlja2VkR2FsbGVyeVxuICAgIGZhbHNlXG5cbiAgIyBwYXJzZSBwaWN0dXJlIGluZGV4IGFuZCBnYWxsZXJ5IGluZGV4IGZyb20gVVJMICgjJnBpZD0xJmdpZD0yKVxuXG4gIHBob3Rvc3dpcGVQYXJzZUhhc2ggPSAtPlxuICAgIGhhc2ggPSB3aW5kb3cubG9jYXRpb24uaGFzaC5zdWJzdHJpbmcoMSlcbiAgICBwYXJhbXMgPSB7fVxuICAgIGlmIGhhc2gubGVuZ3RoIDwgNVxuICAgICAgcmV0dXJuIHBhcmFtc1xuICAgIHZhcnMgPSBoYXNoLnNwbGl0KCcmJylcbiAgICBpID0gMFxuICAgIHdoaWxlIGkgPCB2YXJzLmxlbmd0aFxuICAgICAgaWYgIXZhcnNbaV1cbiAgICAgICAgaSsrXG4gICAgICAgIGNvbnRpbnVlXG4gICAgICBwYWlyID0gdmFyc1tpXS5zcGxpdCgnPScpXG4gICAgICBpZiBwYWlyLmxlbmd0aCA8IDJcbiAgICAgICAgaSsrXG4gICAgICAgIGNvbnRpbnVlXG4gICAgICBwYXJhbXNbcGFpclswXV0gPSBwYWlyWzFdXG4gICAgICBpKytcbiAgICBpZiBwYXJhbXMuZ2lkXG4gICAgICBwYXJhbXMuZ2lkID0gcGFyc2VJbnQocGFyYW1zLmdpZCwgMTApXG4gICAgcGFyYW1zXG5cbiAgb3BlblBob3RvU3dpcGUgPSAoaW5kZXgsIGdhbGxlcnlFbGVtZW50LCBkaXNhYmxlQW5pbWF0aW9uLCBmcm9tVVJMKSAtPlxuICAgIHBzd3BFbGVtZW50ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnLnBzd3AnKVswXVxuICAgIGdhbGxlcnkgPSB1bmRlZmluZWRcbiAgICBvcHRpb25zID0gdW5kZWZpbmVkXG4gICAgaXRlbXMgPSB1bmRlZmluZWRcbiAgICBpdGVtcyA9IHBhcnNlVGh1bWJuYWlsRWxlbWVudHMoZ2FsbGVyeUVsZW1lbnQpXG4gICAgIyBkZWZpbmUgb3B0aW9ucyAoaWYgbmVlZGVkKVxuICAgIG9wdGlvbnMgPVxuICAgICAgZ2FsbGVyeVVJRDogZ2FsbGVyeUVsZW1lbnQuZ2V0QXR0cmlidXRlKCdkYXRhLXBzd3AtdWlkJylcbiAgICAgIGdldFRodW1iQm91bmRzRm46IChpbmRleCkgLT5cbiAgICAgICAgIyBTZWUgT3B0aW9ucyAtPiBnZXRUaHVtYkJvdW5kc0ZuIHNlY3Rpb24gb2YgZG9jdW1lbnRhdGlvbiBmb3IgbW9yZSBpbmZvXG4gICAgICAgIHRodW1ibmFpbCA9IGl0ZW1zW2luZGV4XS5lbC5nZXRFbGVtZW50c0J5VGFnTmFtZSgnaW1nJylbMF1cbiAgICAgICAgcGFnZVlTY3JvbGwgPSB3aW5kb3cucGFnZVlPZmZzZXQgb3IgZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50LnNjcm9sbFRvcFxuICAgICAgICByZWN0ID0gdGh1bWJuYWlsLmdldEJvdW5kaW5nQ2xpZW50UmVjdCgpXG4gICAgICAgIHtcbiAgICAgICAgICB4OiByZWN0LmxlZnRcbiAgICAgICAgICB5OiByZWN0LnRvcCArIHBhZ2VZU2Nyb2xsXG4gICAgICAgICAgdzogcmVjdC53aWR0aFxuICAgICAgICB9XG4gICAgIyBQaG90b1N3aXBlIG9wZW5lZCBmcm9tIFVSTFxuICAgIGlmIGZyb21VUkxcbiAgICAgIGlmIG9wdGlvbnMuZ2FsbGVyeVBJRHNcbiAgICAgICAgIyBwYXJzZSByZWFsIGluZGV4IHdoZW4gY3VzdG9tIFBJRHMgYXJlIHVzZWQgXG4gICAgICAgICMgaHR0cDovL3Bob3Rvc3dpcGUuY29tL2RvY3VtZW50YXRpb24vZmFxLmh0bWwjY3VzdG9tLXBpZC1pbi11cmxcbiAgICAgICAgaiA9IDBcbiAgICAgICAgd2hpbGUgaiA8IGl0ZW1zLmxlbmd0aFxuICAgICAgICAgIGlmIGl0ZW1zW2pdLnBpZCA9PSBpbmRleFxuICAgICAgICAgICAgb3B0aW9ucy5pbmRleCA9IGpcbiAgICAgICAgICAgIGJyZWFrXG4gICAgICAgICAgaisrXG4gICAgICBlbHNlXG4gICAgICAgICMgaW4gVVJMIGluZGV4ZXMgc3RhcnQgZnJvbSAxXG4gICAgICAgIG9wdGlvbnMuaW5kZXggPSBwYXJzZUludChpbmRleCwgMTApIC0gMVxuICAgIGVsc2VcbiAgICAgIG9wdGlvbnMuaW5kZXggPSBwYXJzZUludChpbmRleCwgMTApXG4gICAgIyBleGl0IGlmIGluZGV4IG5vdCBmb3VuZFxuICAgIGlmIGlzTmFOKG9wdGlvbnMuaW5kZXgpXG4gICAgICByZXR1cm5cbiAgICBpZiBkaXNhYmxlQW5pbWF0aW9uXG4gICAgICBvcHRpb25zLnNob3dBbmltYXRpb25EdXJhdGlvbiA9IDBcbiAgICAjIFBhc3MgZGF0YSB0byBQaG90b1N3aXBlIGFuZCBpbml0aWFsaXplIGl0XG4gICAgZ2FsbGVyeSA9IG5ldyBQaG90b1N3aXBlKHBzd3BFbGVtZW50LCBQaG90b1N3aXBlVUlfRGVmYXVsdCwgaXRlbXMsIG9wdGlvbnMpXG4gICAgZ2FsbGVyeS5pbml0KClcbiAgICByZXR1cm5cblxuICAjIGxvb3AgdGhyb3VnaCBhbGwgZ2FsbGVyeSBlbGVtZW50cyBhbmQgYmluZCBldmVudHNcbiAgZ2FsbGVyeUVsZW1lbnRzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChnYWxsZXJ5U2VsZWN0b3IpXG4gIGkgPSAwXG4gIGwgPSBnYWxsZXJ5RWxlbWVudHMubGVuZ3RoXG4gIHdoaWxlIGkgPCBsXG4gICAgZ2FsbGVyeUVsZW1lbnRzW2ldLnNldEF0dHJpYnV0ZSAnZGF0YS1wc3dwLXVpZCcsIGkgKyAxXG4gICAgZ2FsbGVyeUVsZW1lbnRzW2ldLm9uY2xpY2sgPSBvblRodW1ibmFpbHNDbGlja1xuICAgIGkrK1xuICAjIFBhcnNlIFVSTCBhbmQgb3BlbiBnYWxsZXJ5IGlmIGl0IGNvbnRhaW5zICMmcGlkPTMmZ2lkPTFcbiAgaGFzaERhdGEgPSBwaG90b3N3aXBlUGFyc2VIYXNoKClcbiAgaWYgaGFzaERhdGEucGlkIGFuZCBoYXNoRGF0YS5naWRcbiAgICBvcGVuUGhvdG9Td2lwZSBoYXNoRGF0YS5waWQsIGdhbGxlcnlFbGVtZW50c1toYXNoRGF0YS5naWQgLSAxXSwgdHJ1ZSwgdHJ1ZVxuICByZXR1cm5cblxuIyBleGVjdXRlIGFib3ZlIGZ1bmN0aW9uXG5pbml0UGhvdG9Td2lwZUZyb21ET00gJy5nYWxsZXJ5J1xuXG4jIC0tLVxuIyBnZW5lcmF0ZWQgYnkganMyY29mZmVlIDIuMi4wIl19
//# sourceURL=coffeescript