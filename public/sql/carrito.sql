INSERT INTO `authors` (`id`, `name`, `last_name`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Boichi', '', 'Artista', NULL, NULL),
(2, 'Riichiro', 'Inagaki', 'Mangaka', NULL, NULL),
(4, 'Gege', 'Akutami', 'Mangaka', NULL, NULL),
(5, 'Yuki', 'Tabata', 'Mangaka', NULL, NULL),
(6, 'Yoshigiro', 'Togashi', 'Mangaka', NULL, NULL),
(7, 'Sui', 'Ishida', 'Mangaka', NULL, NULL);

INSERT INTO `genders` (`id`, `enum_gender`, `created_at`, `updated_at`) VALUES
(1, 'Shonen', '2022-07-06 00:18:58', '2022-07-06 00:18:58'),
(2, 'Seinen', '2022-07-06 00:27:23', '2022-07-06 00:27:23'),
(3, 'Magia', '2022-07-06 00:27:52', '2022-07-06 00:27:52'),
(4, 'Drama', NULL, NULL),
(5, 'Gore', NULL, NULL);


INSERT INTO `mangas` (`id`, `name`, `url_portrait`, `state`, `published_at`, `periodicity`, `synopsis`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Stone', 'https://pack-yak.intomanga.com/thumbnails/manga/Dr-Stone/d9e47ba6-7dfc-401d-a21c-19326c2ea45f', 'broadcast', '06/03/2017', 'Diaria', 'La aventura de ciencia ficción sigue a dos muchachos que luchan por revivir a la humanidad después de que una misteriosa crisis ha dejado a todos en el mundo convertidos en piedra durante varios milenios.', '2022-07-06 05:14:59', '2022-07-06 05:14:59'),
(2, 'Jujutsu Kaisen', 'https://pack-yak.intomanga.com/thumbnails/manga/Jujutsu-Kaisen/d88692a5-c341-47fc-8e39-da11a8fdee82', 'broadcast', '28/04/2017', 'mensual', 'Yuuji Itadori es un estudiante con unas habilidades físicas excepcionales. Todos los días, como rutina, va al hospital a visitar a su abuelo enfermo y decide apuntarse al club de ocultismo de instituto para no dar un palo en el agua... Sin embargo, un buen día el sello del talismán que se hallaba escondido en su instituto se rompe, y comienzan a aparecer unos monstruos. Ante este giro de los acontecimientos, Itadori decide adentrarse en el instituto para salvar a sus compañeros. ¿Qué le deparará el destino?', '2022-07-06 05:15:46', '2022-07-06 05:15:46'),
(3, 'Black Clover', 'https://pack-yak.intomanga.com/thumbnails/manga/Black-Clover/e7f9297e-377a-4c23-b396-ae88600251b1', 'broadcast', '16/02/2015', 'semanal', 'La historia gira entorno a Asta, un chico bullicioso y sin aparente talento mágico y Yuno, su amigo y rival, el cual es un genio en el uso de la magia. Ambos tienen sueños de convertirse en el Rey Mago, para cumplir la promesa hecha por ambos durante su infancia, uno de los dos debe ser el mago más fuerte.', '2022-07-06 05:17:05', '2022-07-06 05:17:05'),
(4, 'Hunter X Hunter', 'https://pack-yak.intomanga.com/thumbnails/manga/Hunter-X-Hunter/e33aa40a-421e-4428-93d8-abbe8a52de3f', 'broadcast', '03/03/1998', 'semanal', 'Los Hunters son personas que se dedican principalmente a rastrear tesoros, descubrir o cazar criaturas mágicas y algunas veces otros hombres. Pero, estas actividades requieren una licencia, y menos de uno entre cien-mil puede pasar el examen de cualificación. Aquellos que logren pasar el duro examen se ganarán el acceso a áreas restringidas y el derecho a llamarse a si mismos Hunters.', '2022-07-06 05:18:36', '2022-07-06 05:18:36'),
(5, 'Tokyo Ghoul: Re', 'https://inmanga.com/thumbnails/manga/Tokyo-Ghoul-Re/49bf941d-060f-4849-a109-9277c010c713', 'finished', '24/10/2014', 'semanal', 'En Tokyo, la tragedia sigue su curso. Los ghouls, seres misteriosos que se alimentan de carne humana, se propagan por sus calles. Mezclándose entre los humanos durante el día, aterrorizándolos al caer la noche.\r\n\r\nEn ese angustioso escenario el CCG, única institución que investiga y resuelve los casos relacionados con ghouls, encomienda una misión especial a Haise Sasaki, un talentoso investigador con un pasado enigmático.\r\n\r\nUna puerta se ha abierto y los misterios tras ella serán revelados, días oscuros comienzan para Haise.', '2022-07-06 05:39:07', '2022-07-06 05:39:07'),
(8, 'Dodoro', 'https://es.web.img2.acsta.net/pictures/19/06/26/11/13/1639915.jpg', 'finished', '2022-06-01', 'semanal', 'Dororo es un anime que sigue la historia de Hyakkimaru, un niño que su padre concede a cuarenta y ocho demonios las cuarenta y ocho partes de su cuerpo. Hyakkimaru fue abandonado, lo rescató un doctor que lo vuelve a componer con partes de cadáveres de niños. Ya adulto decide buscar sus partes perdidas.', '2022-07-09 04:17:27', '2022-07-09 04:17:27');


INSERT INTO `tomes` (`id`, `number_tome`, `published_at`, `number_pages`, `price`, `created_at`, `updated_at`, `manga_id`) VALUES
(101, 1, '2017-03-06', 48, 9.99, '2022-07-06 01:49:39', '2022-07-06 01:49:39', 1),
(102, 2, '2017-03-06', 25, 9.99, '2022-07-06 01:49:39', '2022-07-06 01:49:39', 1),
(103, 3, '2017-03-13', 23, 9.99, '2022-07-06 01:49:39', '2022-07-06 01:49:39', 1),
(104, 4, '2017-03-20', 19, 9.99, '2022-07-06 01:49:39', '2022-07-06 01:49:39', 1),
(105, 5, '2017-03-27', 19, 9.99, '2022-07-06 01:49:39', '2022-07-06 01:49:39', 1),
(201, 1, '2017-04-28', 54, 9.87, '2022-07-06 01:52:29', '2022-07-06 01:52:29', 2),
(202, 2, '2017-05-05', 21, 9.87, '2022-07-06 01:52:29', '2022-07-06 01:52:29', 2),
(203, 3, '2017-05-12', 24, 9.87, '2022-07-06 01:52:29', '2022-07-06 01:52:29', 2),
(204, 4, '2017-05-19', 21, 9.87, '2022-07-06 01:52:29', '2022-07-06 01:52:29', 2),
(205, 5, '2017-05-26', 21, 9.87, '2022-07-06 01:52:29', '2022-07-06 01:52:29', 2),
(301, 1, '2015-02-16', 52, 9.56, '2022-07-06 01:52:29', '2022-07-06 01:52:29', 3),
(302, 2, '2015-02-23', 26, 9.56, '2022-07-06 01:52:29', '2022-07-06 01:52:29', 3),
(303, 3, '2015-03-02', 23, 9.56, '2022-07-06 01:52:29', '2022-07-06 01:52:29', 3),
(304, 4, '2015-03-09', 20, 9.56, '2022-07-06 01:52:29', '2022-07-06 01:52:29', 3),
(305, 5, '2015-03-16', 20, 9.56, '2022-07-06 01:52:29', '2022-07-06 01:52:29', 3),
(401, 1, '1998-03-03', 32, 9.87, '2022-07-06 01:52:29', '2022-07-06 01:52:29', 4),
(402, 2, '1998-03-10', 24, 9.87, '2022-07-06 01:52:29', '2022-07-06 01:52:29', 4),
(403, 3, '1998-03-17', 20, 9.87, '2022-07-06 01:52:29', '2022-07-06 01:52:29', 4),
(404, 4, '1998-03-24', 22, 9.87, '2022-07-06 01:52:29', '2022-07-06 01:52:29', 4),
(405, 5, '1998-03-31', 20, 9.87, '2022-07-06 01:52:29', '2022-07-06 01:52:29', 4),
(501, 1, '2014-10-24', 44, 9.99, '2022-07-06 01:52:29', '2022-07-06 01:52:29', 5),
(502, 2, '2014-10-31', 23, 9.99, '2022-07-06 01:52:29', '2022-07-06 01:52:29', 5),
(503, 3, '2014-11-07', 22, 9.99, '2022-07-06 01:52:29', '2022-07-06 01:52:29', 5),
(504, 4, '2014-11-14', 19, 9.99, '2022-07-06 01:52:29', '2022-07-06 01:52:29', 5),
(505, 5, '2014-11-21', 16, 9.99, '2022-07-06 01:52:29', '2022-07-06 01:52:29', 5);

INSERT INTO `gender_manga` (`gender_id`, `manga_id`) VALUES
(1, 3),
(3, 3),
(1, 4),
(1, 2),
(3, 2),
(1, 1),
(2, 1),
(4, 2),
(4, 5),
(5, 5);
INSERT INTO `author_manga` (`author_id`, `manga_id`) VALUES
(1, 1),
(2, 1),
(4, 2),
(5, 3),
(6, 4),
(7, 5);
