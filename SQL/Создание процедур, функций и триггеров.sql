DELIMITER $$
CREATE FUNCTION get_or_create_cart(userid INT) 
RETURNS INT 
BEGIN 
    DECLARE cart_id INT; 
    SELECT id INTO cart_id FROM carts WHERE user_id = userid and status = 0;
    IF cart_id IS NULL THEN 
        INSERT INTO carts(user_id) VALUES (userid); 
        SET cart_id = LAST_INSERT_ID(); 
    END IF; 
    RETURN cart_id; 
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE change_subcart(IN userid INT, IN p_item INT, IN p_count INT)
BEGIN
    DECLARE subcart_id INT;
    DECLARE cartid INT;
    SET cartid = get_or_create_cart(userid);
    SELECT id INTO subcart_id from subcarts where cart_id = cartid and item_id = p_item;
    IF subcart_id IS NULL THEN 
        INSERT INTO subcarts(cart_id, item_id, quantity) VALUES (cartid, p_item, p_count); 
    ELSEIF p_count > 0 THEN
        UPDATE subcarts SET quantity = p_count where id = subcart_id;
    ELSE 
        DELETE FROM subcarts WHERE id = subcart_id;
    END IF;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE update_cart(IN userid INT)
BEGIN
    DECLARE cartid INT;
    SET cartid = get_or_create_cart(userid);
    UPDATE carts SET status = 1 where carts.id = cartid;
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER delete_subcarts_trigger 
  BEFORE DELETE ON carts 
  FOR EACH ROW
BEGIN
  DELETE FROM subcarts WHERE subcarts.cart_id = OLD.id;
END$$
DELIMITER ;