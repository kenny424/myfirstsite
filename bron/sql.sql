SELECT place.id FROM place LEFT OUTER JOIN booking on booking.id_place=place.id WHERE place.id=booking.id_place