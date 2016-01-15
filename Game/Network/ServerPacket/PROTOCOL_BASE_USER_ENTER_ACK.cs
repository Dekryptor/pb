﻿/*
 * C# Server Emulator Project Blackout / PointBlank
 * Authors: the__all
 * Copyright (C) 2015 | OZ-Network
 */
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Game.Network.ServerPacket
{
    class PROTOCOL_BASE_USER_ENTER_ACK : SendPacket
    {
        public override void WriteImpl()
        {
            WriteH(0xA14);
            WriteD(0);
        }
    }
}
