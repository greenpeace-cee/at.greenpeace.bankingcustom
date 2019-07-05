CRM.$(document).on('banking_contact_option_element', function(event, label, contact) {
  label = label.split(']')[0] + '] ';
  // add birth_date if set
  if (contact.birth_date) {
    var birth_date = new Date(contact.birth_date);
    var options = { year: 'numeric', month: '2-digit', day: '2-digit' };
    var formatted_date = new Intl.DateTimeFormat('de-AT', options).format(birth_date);
    label += ' (' + formatted_date + ')';
  }
  // add address fields if set
  if (contact.street_address || contact.city || contact.postal_code) {
    label += ' (' + contact.street_address + ', ' + contact.postal_code +  ' ' + contact.city + ')';
  }
  return label;
});