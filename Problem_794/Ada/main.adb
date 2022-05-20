with Ada.Containers; use Ada.Containers;
with Ada.Containers.Vectors;
with Ada.Text_IO; use Ada.Text_IO;
with Ada.Integer_Text_IO; use Ada.Integer_Text_IO;

procedure Main is
	package Integer_Vector is new Ada.Containers.Vectors (Index_Type => Natural, Element_Type => Integer);
	use Integer_Vector;

	Stack : Vector;

	procedure Push (s : in out Vector; v : Integer) is
	begin
		s.Append(v);
	end Push;

	-- A messy pop function
	-- Makes full use of Containers.Vectors
	function Pop (s : in out Vector) return Integer is
		v : Integer;
	begin
		for I in s.Last_Index .. s.Last_Index loop
			v := s(I);
		end loop;

		s.Delete(s.Last_Index);

		return v;
	end Pop;

	-- Simply iterates over the vecotr until it has the largest value
	function Max (s : in Vector) return Integer is
		v : Integer := 0;
	begin
		for I in s.Iterate loop
			if s(I) > v then
				v := s(I);
			end if;
		end loop;

		return v;
	end Max;

	type Operation is (None, Push, Pop, Max, Quit);

	Selection : Operation := None;
	input : Integer;
begin
	while Selection /= Quit loop
		New_Line; New_Line;
		Put_Line("Please select an operation: ");
		Put_Line("Enter either Push, Pop, Max, or Quit");
		Selection := Operation'Value(Get_Line);
		
		case Selection is
			when Push =>
				New_Line;
				Put("Please enter your value: ");
				input := Integer'Value(Get_Line);
				Push(Stack, input);
				Selection := None;
			when Pop =>
				New_Line;
				Put("Popped value is: "); Put(Integer'Image(Pop(Stack))); New_Line;
				Selection := None;
			when Max =>
				New_Line;
				Put("Max value is: "); Put(Integer'Image(Max(Stack))); New_Line;
				Selection := None;
			when Quit =>
				Put_Line("Thank you!");
			when others =>
				Put_Line("Invalid input!");
				Selection := None;
		end case;
	end loop;
end Main;
