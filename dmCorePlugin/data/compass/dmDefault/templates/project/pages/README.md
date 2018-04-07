# Use this section to store page specific CSS.

DM generates context dependant classes in the body tag, following the rule: .page_[module]_[slug]

## Examples:

Home: 
  .page_main_root
About Us (manual page):
  .page_main_aboutUs
Product list, assuming module is product (automatic page):
  .page_product_list
Product show, assuming module is product (automatic page):
  .page_product_show

## Expected structure
One file per page, named _[module]_[slug].scss, containing the class .page_[module]_[slug] and the css customizations needed.
### Example
  .page_main_aboutUs{
    h3{
      color: green;
      font-size: px2rem(25px);
    }
  }
